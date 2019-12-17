
// Create array of question objects
var myQuestions = [
  {
    number: '1',
    question: 'What plant does CBD mainly come from?',
    answers: {
      a: 'Poison Ivy',
      b: 'Pine Trees',
      c: 'Hemp',
      d: 'Daffodil'
    },
    correctAnswer: 'c'
  },
  {
    number: '2',
    question: 'What does CBD stand for?',
    answers: {
      a: 'Carrying Big Ducks',
      b: 'Cannabidiol',
      c: 'Cadmium Biodate Dextromethine',
      d: 'Calcium Bromide Diborane'
    },
    correctAnswer: 'b'
  },
  {
    number: '3',
    question: 'What is the "science-y" name for chemicals like CBD?',
    answers: {
      a: 'Cannabinoids',
      b: 'Carcinogens',
      c: 'Carboxyls',
      d: 'Carbodiimides'
    },
    correctAnswer: 'a'
  },
  {
    number: '4',
    question: 'How is CBD most commonly administered?',
    answers: {
      a: 'Suppository',
      b: 'Shot',
      c: 'IV',
      d: 'Sublingual Drop'
    },
    correctAnswer: 'd'
  },
  {
    number: '5',
    question: 'What types of products can contain CBD?',
    answers: {
      a: 'Lotions',
      b: 'Edibles',
      c: 'Peanut Butter',
      d: 'All of the above'
    },
    correctAnswer: 'd'
  },
  {
    number: '6',
    question:
      'What was the name of the bill that was signed by president Trump that legalized CBD and CBD products?',
    answers: {
      a: 'The Farm Bill',
      b: 'The Weed Bill',
      c: 'The Marijuana Bill',
      d: 'The Can-we-finally-get-high-without-going-to-jail Bill'
    },
    correctAnswer: 'a'
  },
  {
    number: '7',
    question: 'CBD is psychoactive. (T/F)',
    answers: {
      t: 'True',
      f: 'False'
    },
    correctAnswer: 'f'
  },
  {
    number: '8',
    question: 'CBD helps with pain management.',
    answers: {
      t: 'True',
      f: 'False'
    },
    correctAnswer: 't'
  },
  {
    number: '9',
    question: 'CBD will make you groggy and tired. (T/F)',
    answers: {
      t: 'True',
      f: 'False'
    },
    correctAnswer: 'f'
  },
  {
    number: '10',
    question: 'CBD is only legal in some states. (T/F)',
    answers: {
      t: 'True',
      f: 'False'
    },
    correctAnswer: 'f'
  }
];

var quizContainer = document.getElementById('quiz');
var resultsContainer = document.getElementById('results');
var submitButton = document.getElementById('submit');
var unAnsweredContainer = document.getElementById('unAns');

generateQuiz(
  myQuestions,
  quizContainer,
  resultsContainer,
  unAnsweredContainer,
  submitButton
);

function generateQuiz(
  questions,
  quizContainer,
  resultsContainer,
  unAnsweredContainer,
  submitButton
) {
  function removeElement(elementId) {
    // Removes an element from the document
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
  }

  function showQuestions(questions, quizContainer) {
    // we'll need a place to store the output and the answer choices
    var output = [];
    var questAnswers;

    // for each question...
    for (var i = 0; i < questions.length; i++) {
      // first reset the list of answers
      questAnswers = [];

      // for each available answer...
      for (letter in questions[i].answers) {
        // ...add an html radio button
        questAnswers.push(
          '<label>' +
            '<input type="radio" name="question' +
            i +
            '" value="' +
            letter +
            '">' +
            letter +
            ': ' +
            questions[i].answers[letter] +
            ' ' +
            '</label>'
        );
      }

      // add this question and its answers to the output
      output.push(
        '<div class="bigDiv">' +
          '<div class="question">' +
          questions[i].number +
          '.  ' +
          questions[i].question +
          '</div>' +
          '<div class="answers">' +
          questAnswers.join('') +
          '</div>' +
          '</div>'
      );
    }

    // finally combine our output list into one string of html and put it on the page
    quizContainer.innerHTML += output.join('');
  }

  function gradeQuiz(
    questions,
    quizContainer,
    resultsContainer,
    unAnsweredContainer
  ) {
    // gather answer containers from our quiz
    var answerContainers = quizContainer.querySelectorAll('.answers');

    unAnsweredContainer.innerHTML = '';
    // keep track of user's answers and get their name from input
    var firstName = document.getElementById('fName').value;
    var lastName = document.getElementById('lName').value;
    var userAnswer = '';
    var unAnswer = [];
    var numCorrect = 0;
    var unAnsOutput = [];

    // for each question...
    for (var i = 0; i < questions.length; i++) {
      // find selected answer
      userAnswer = (
        answerContainers[i].querySelector(
          'input[name=question' + i + ']:checked'
        ) || {}
      ).value;

      // if answer is blank
      if (userAnswer === undefined) {
        answerContainers[i].style.color = 'red';
        unAnswer.push(
          'Question number ' + questions[i].number + ' is unanswered.\n'
        );
      }
      // if answer is correct
      if (userAnswer === questions[i].correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[i].style.color = 'lightgreen';
      }
      // if answer is wrong
      else {
        // color the answers red
        answerContainers[i].style.color = 'red';
      }
    }
    if (unAnswer.length > 0) {
      for (i = 0; i < unAnswer.length; i++) {
        unAnsOutput.push('<p> ' + unAnswer[i] + ' <p>');
      }

      unAnsweredContainer.innerHTML =
        '<div class="unAnswered">' + unAnsOutput.join('') + '</div>';
      removeElement('quiz');
      removeElement('submit');
      var reTake = document.createElement('BUTTON');
      reTake.setAttribute('id', 'retake');
      reTake.onclick = function() {
        location = location;
      };
      reTake.innerText = 'Retake Quiz';
      document.body.appendChild(reTake);
    } else {
      // clear quiz container html
      // show number of correct answers out of total
      // add button to retake quiz

      resultsContainer.innerHTML =
        '<div class="resultDiv">' +
        'Hey! ' +
        firstName +
        ' ' +
        lastName +
        ' ' +
        'You got ' +
        (numCorrect / questions.length) * 100 +
        '%  of the questions correct!' +
        ' Or ' +
        numCorrect +
        ' out of ' +
        questions.length +
        ' correct.' +
        '</div>';
      removeElement('quiz');
      removeElement('submit');
      var reTake = document.createElement('BUTTON');
      reTake.setAttribute('id', 'retake');
      reTake.onclick = function() {
        location = location;
      };
      reTake.innerText = 'Retake Quiz';
      document.body.appendChild(reTake);
    }
  }

  // show questions right away
  showQuestions(questions, quizContainer);

  // on submit, show results
  submitButton.onclick = function() {
    gradeQuiz(questions, quizContainer, resultsContainer, unAnsweredContainer);
  };
}
