<?php
function generate_random_string($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generate_valid_id($conn, $table)
{
    $valid_id = false;
    while ($valid_id == false) {
        $id = generate_random_string(10);
        $stmt = $conn->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $results_id = $stmt->get_result();
        if ($results_id->num_rows == 0) {
            $valid_id = true;
        }
    }
    return $id;
}




