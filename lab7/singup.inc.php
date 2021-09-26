<?php
     include_once 'db_connect.php';

     $email = $_POST['email'];
     $contact_number = $_POST['contact_number'];
     $blood_group = $_POST['blood_group'];
     $donor_name = $_POST['donor_name'];
     $last_date_of_blood_donation = $_POST['last_date_of_blood_donation'];
     $district= $_POST['district'];
     $postal_code= $_POST['postal_code'];
     $thana= $_POST['thana'];
     $house_no= $_POST['house_no'];

        $sql = "INSERT INTO donor(email,contact_number,blood_group,donor_name,last_date_of_blood_donation,district,postal_code,thana,house_no)
        values ('$email','$contact_number','$blood_group','$donor_name' ,'$last_date_of_blood_donation','$district','$postal_code','$thana','$house_no');";

       $result = mysqli_query($conn,$sql);

       header("Location: Donor_register.php?signup=success");
    ?>