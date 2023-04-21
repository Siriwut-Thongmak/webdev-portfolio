'use strict';
let number = Math.trunc(Math.random() * 20) + 1;
//document.querySelector('.number').textContent = number;
let score = 20;
let highScore = 0;
let newScore = 0;

const DisplayMessage = function (message) {
  document.querySelector('.message').textContent = message;
};

document.querySelector('.check').addEventListener('click', function () {
  const guess = Number(document.querySelector('.guess').value);
  if (!guess) {
    DisplayMessage('Please Enter a Number');
  } else if (guess === number) {
    DisplayMessage('Correct!');
    highScore = score;
    newScore = score;
    newScore > score ? (highScore = newScore) : highScore;
    document.querySelector('.highscore').textContent = highScore;
    document.querySelector('body').style.backgroundColor = '#55aa55';
    document.querySelector('.number').textContent = number;
    document.querySelector('.number').textContent = number;
  } else {
    score = score === 0 ? score : --score;
    DisplayMessage(guess < number ? 'Too Low!' : 'Too High!');
    document.querySelector('.score').textContent = score;
  }
});

document.querySelector('.again').addEventListener('click', function () {
  score = 20;
  number = Math.trunc(Math.random() * 20) + 1;
  DisplayMessage('Start guessing...');
  document.querySelector('.number').textContent = '?';
  document.querySelector('.score').textContent = score;
  document.querySelector('.guess').value = '';
  document.querySelector('body').style.backgroundColor = '#222';
});
