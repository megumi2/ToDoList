<?php 
    //DBに接続
    require('data_connect.php');


    $query='select task_name, id, priority, start_date, end_date, complete from todo_task;';
    $result= $db->query($query);
    
    if (!$result) {
        die("クエリエラー: " . $db->error);
    }

    while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td id="' . $row['id'] . '">' . $row['task_name'] . '</td>';
        echo '<td>'.$row['priority'].'</td>';
        echo '<td>'.$row['start_date'].'</td>';
        echo '<td>'.$row['end_date'].'</td>';
        echo '<td>'.'<button type="button" class="btn btn-edit">'.'編集'.'</button>'.'</td>';
        echo '<td><input class="form-check-input" type="checkbox" value="'.$row['id'].'"name = "check_box" id="flexCheckChecked_'.$row['id'].'"></td>';
        echo '</tr>';
    }
    $db->close();
    ?>