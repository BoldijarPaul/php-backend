<?php

require_once 'DatabaseController.php';

class AnswerController extends DatabaseController {
 
 

  public function getAnswer($question){
    $randVal = rand(0,10);
    if ($randVal < 3) {
     return $this->getNoAnswer($question);
    }
    $sql = "select * from suggestions where question = '".$question."' order by rand() limit 1";
    $result = $this->getConnection()->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $suggestion=new stdClass();
            $suggestion->id=$row['id'];
            $suggestion->answer=$row['answer'];
            $suggestion->question=$row['question'];
            $suggestion->success=true;
            return $suggestion;
          }
        }
   return $this->getNoAnswer($question);
  }

  private function getNoAnswer($question){
    $suggestion=new stdClass();
    $suggestion->success=false;
    $suggestion->answer=$question;
    $suggestion->question=$question;

    return $suggestion;  
  }
  public function addSuggestion($question,$answer){
    $sql = "insert into suggestions(question,answer) values('".$question."','".$answer."')";
    $result = $this->getConnection()->query($sql);
    $suggestion=new stdClass();
    $suggestion->id=$this->getConnection()->insert_id;
    $suggestion->question=$question;
    $suggestion->answer=$answer;
    if($this->getError()!=""){
      return null; 
    }
    return $suggestion;
  }
  
  

}



?>