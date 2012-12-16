<?php
require_once "MP_FormValidator.php";
interface IFormAsset{
  function render();
  function validate();
  function getType();
}
