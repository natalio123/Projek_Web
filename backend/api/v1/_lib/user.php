<?php

class UserHandler extends RequestHandler {
    function POST(){
        // get the request body
        $req = json_decode($this->body, true);
        
        # ref: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $prepared_statement = $this->connection->prepare("
            INSERT INTO user_form (nama, email, password, user_type)
            VALUE (?, ?, ?, ?)
        ");
        
        $prepared_statement->bind_param('ssss', ...[
            $req['nama'], $req['email'], $req['password'], $req['user_type']
        ]);
        
        $prepared_statement->execute();
        return $req;
    }

    function PATCH(){
        $req = json_decode($this->body, true);
        $filtered_array = array();
        

        $where_condition = "";
        if (!is_null($req)){
            foreach($req as $key => $value){
                if (is_null($value)){
                    continue;
                }
                if (is_numeric($value)){
                    
                }
                $filtered_array[$key] = $value;
            }
        }
        var_dump($filtered_array);

        
    }

}
