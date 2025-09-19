<?php

namespace App\components\TodoCard;

class TodoCard{
  public function createCard(){

    $card = <<<CARD
      <div class='card'>
        <div class='cardHead'>
          <h3 class='todo_title'>Clean</h3>
          <small><b>Done</b></small>
        </div>

        <div class='cardBody'>
          <p class='todo_desc'>Lorem</p>
        </div>

        <div class='cardFooter'>
          <div class='button-grp'>
            <button class='btn-undone'>Undone</button>
            <button class='btn-done'>Done</button>
          </div>
        </div>
      </div>
    CARD;

    return $card;
  }
}