<?php
class Counter{

  private $counter;
  public function __construct()
  {
    $this->read_counter_file();
    $this->update_and_increment();
  }

  public function get_counter(){
    return $this->counter;
  }

  public function update_file(){
    $fp = fopen(COUNTER_FILE,"w+");

    fwrite($fp,$this->counter);
    fclose($fp);
  }

  public function increment(){
    if(!$this->check_counter_in_session()){
      $this->counter++;
      $_SESSION[SESSION_CHECK_COUNTER] = true;
    }
  }

  private function read_counter_file(){
    if (file_exists(COUNTER_FILE)) {
        $this->counter =  intval(file_get_contents(COUNTER_FILE));
    }else{
      $this->counter = 1;

      $fp = fopen(COUNTER_FILE,"w+");
      fwrite($fp,$this->counter);
      fclose($fp);
    }
  }

  public function update_and_increment(){
    $this->increment();
    $this->update_file();
  }


  private function check_counter_in_session(){
    return $_SESSION[SESSION_CHECK_COUNTER] ?? false;
  }


}