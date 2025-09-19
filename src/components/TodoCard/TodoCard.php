<?php

namespace App\components\TodoCard;

enum TaskStatus: int{
  case Done = 1;
  case Planned = 0;
  case Pending = -1;

  public function getLabel():string{
    return match($this){
      self::Done => "Done",
      self::Planned => "Planned",
      self::Pending => "Pending"
    };
  }
}

class TodoCard{
  // title, status, desc, id
  public function __construct(
    private string $title, 
    private string $status, 
    private string $descr, 
    private int $id,){
      $statusEnum = TaskStatus::from($this->status);
      $this->status = $statusEnum->getLabel();
      $this->title = htmlspecialchars($this->title);
      $this->status = htmlspecialchars($this->status);
      $this->descr = htmlspecialchars($this->descr);
      $this->id = htmlspecialchars($this->id);
    }

  public function createCard(){
    $card = <<<CARD
      <div class='card'>
        <div class='cardHead'>
          <h3>$this->title</h3>
          <small><b>$this->status</b></small>
        </div>
        <div class='cardBody'>
          <p class='todo_desc'>$this->descr</p>
        </div>
        <div class='cardFooter'>
          <div class='button-grp'>
            <form action="" method="post">
              <button type="submit" name="pending" value="$this->id" class='btn-pending'>Pending</button>
            </form>
            <form action="" method="post">
              <button type="submit" name="done" value="$this->id" class='btn-done'>Done</button>
            </form>
          </div>
        </div>
      </div>
    CARD;

    return $card;
  }
}