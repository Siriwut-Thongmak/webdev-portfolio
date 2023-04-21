"use strict";

const submitBtn = document.querySelector(".btn-submit");
const scoreText = document.querySelector(".score");
const question = document.querySelector("#question");
const qPanel = document.querySelector(".question-panel");
const dPanel = document.querySelector(".dialog-panel");
const reBtn = document.querySelector(".btn-restart");
const input = document.querySelector("input");
const summary = document.querySelector("#summary");

let label = 1;
let score = 0;
let gen1 = 0;
let gen2 = 0;
let result = 0;

const init = function () {
  label = 1;
  score = 0;
  scoreText.textContent = `Score: ${score}/5`;
};

init();

const genQuestion = function () {
  gen1 = Math.trunc(Math.random() * 10) + 1;
  gen2 = Math.trunc(Math.random() * 10) + 1;
  result = gen1 + gen2;
  question.textContent = `${label}. What is ${gen1} + ${gen2}`;
};

genQuestion();

const switchPanel = function () {
  qPanel.classList.toggle("hidden");
  dPanel.classList.toggle("hidden");
};

const checkANS = function () {
  let ans = Number(input.value);
  if (result === ans) {
    score++;
    scoreText.textContent = `Score: ${score}/5`;
  }
};

const checkLabel = function () {
  if (label > 5) {
    switchPanel();
    summary.textContent = `Your score is ${score}/5`;
  }
};

submitBtn.addEventListener("click", function () {
  checkANS();
  input.value = "";
  label++;
  genQuestion();
  checkLabel();
});

reBtn.addEventListener("click", function () {
  switchPanel();
  init();
  genQuestion();
});
