<?php
require 'database.php';
require 'user.php';

$user = new User();

if(isset($_POST['action']) && $_POST['action'] == "view"){

    $data = $user->read();

    if($user->totalRowCount()>0){
        $output = '
        <table id="usersTable" class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach($data as $row){
            $output .= '
            <tr class="text-center text-secondary">
                                <td>'.$row['id'].'</td>
                                <td>'.$row['fName'].'</td>
                                <td>'.$row['lName'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>
                                    <a href="" title="Edit" class="text-primary mx-1 editBtn" id="'.$row['id'].'"><i class="fas fa-edit" data-toggle="modal" data-target="#editModal"></i></a>
                                    <a href="" title="Delete" class="deleteBtn text-danger mx-1" id="'.$row['id'].'"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    }
    else{
        echo '<h3>no data</h3>';
    }
}


if(isset($_POST['action']) && $_POST['action'] == "insert"){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $user->insert($fname, $lname, $email, $phone);
}


if(isset($_POST['edit_id'])){
    $id = $_POST['edit_id'];
    $row = $user->getUserById($id);
    if($row){
        echo json_encode($row);
    }
    else{
        echo json_encode(["error" => "not found"]);
    }
}


if(isset($_POST['action']) && $_POST['action'] == "update"){
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user->update($id, $fname, $lname, $email, $phone);
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];

    $user->delete($id);
}
