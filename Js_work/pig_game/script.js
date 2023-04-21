'use strict';

//Select elements
const score0El = document.querySelector('#score--0');
const score1El = document.getElementById('score--1');
const current0El = document.getElementById('current--0');
const current1El = document.getElementById('current--1');
const player0El = document.querySelector('.player--0');
const player1El = document.querySelector('.player--1');

//const diceEl = document.getElementsByClassName('dice');
const diceEl = document.querySelector('.dice');
const btnNew = document.querySelector('.btn--new');
const btnRoll = document.querySelector('.btn--roll');
const btnHold = document.querySelector('.btn--hold');

let currentScore = 0;
let player = 0;
let scores = [0, 0];


const switchPlayer = function(){
    currentScore = 0;
    document.getElementById(`current--${player}`).textContent = 0;
    player = player === 0 ? 1 : 0;
    player0El.classList.toggle('player--active');
    player1El.classList.toggle('player--active');
}

score0El.textContent = 0;
score1El.textContent = 0;
diceEl.classList.add('hidden');

btnRoll.addEventListener('click', function () {
  const dice = Math.trunc(Math.random() * 6) + 1;
  diceEl.classList.remove('hidden');
  diceEl.src = `dice-${dice}.png`;
  if (dice !== 1) {
    currentScore += dice;
    document.getElementById('current--' + player).textContent = currentScore;
  } else
    switchPlayer();

});

btnHold.addEventListener('click',function(){
  scores[player] += currentScore;
  document.getElementById(`score--${player}`).textContent = scores[player];
  if(scores[player] >= 20){
    document.querySelector('.player--'+player).classList.add('player--winner');
    btnRoll.disabled = true;
    btnHold.disabled = true;
  }
  else
    switchPlayer();
});

btnNew.addEventListener('click',function(){
  btnRoll.disabled = false;
  btnHold.disabled = false;

  document.querySelector('.player--'+player).classList.remove('player--winner');
  diceEl.classList.add('hidden');

  scores = [0,0];
  currentScore = 0;

  score0El.textContent = 0;
  score1El.textContent = 0;
  current0El.textContent = 0;
  current1El.textContent = 0;
  player0El.classList.add('player--active');
  player1El.classList.remove('player--active');
});
