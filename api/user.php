<?php
    //กำหนดค่า Access-Control-Allow-Origin ให้ เครื่อง อื่น ๆ สามารถเรียกใช้งานหน้านี้ได้
    header("Access-Control-Allow-Origin: *");
    
    header("Content-Type: application/json; charset=UTF-8");
    
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    
    header("Access-Control-Max-Age: 3600");
    
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    //ตั้งค่าการเชื่อมต่อฐานข้อมูล
    $link = mysqli_connect('127.0.0.1', 'root', 'root', 'unace');
 
    mysqli_set_charset($link, 'utf8');
    
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    
    //ตรวจสอบหากใช้ Method GET
    if($requestMethod == 'GET'){
        //ตรวจสอบการส่งค่า id
        if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
            
            $id = $_GET['user_id'];
            
            //คำสั่ง SQL กรณี มีการส่งค่า id มาให้แสดงเฉพาะข้อมูลของ id นั้น
            $sql = "SELECT * FROM users WHERE user_id = $id";
            
        }else{
            //คำสั่ง SQL แสดงข้อมูลทั้งหมด
            $sql = "SELECT * FROM users";
        }
        
        $result = mysqli_query($link, $sql);
        
        //สร้างตัวแปร array สำหรับเก็บข้อมูลที่ได้
        $arr = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
             
             $arr[] = $row;
        }
        
        echo json_encode($arr);

    }
    // 
//       ยังไม่เสร็จโว้ยยยยยยยยยยยยยยยยยยยยยยยยยยยยยย
// 
//     //อ่านข้อมูลที่ส่งมาแล้วเก็บไว้ที่ตัวแปร data
//     $data = file_get_contents("php://input");
 
//     //แปลงข้อมูลที่อ่านได้ เป็น array แล้วเก็บไว้ที่ตัวแปร result
//     $result = json_decode($data,true);
 
//     //ตรวจสอบการเรียกใช้งานว่าเป็น Method POST หรือไม่
//     if($requestMethod == 'POST'){
        
//         if(!empty($result)){
            
//             $memberID = $result['memberid'];
//             $password = $result['password'];
//             $fullname = $result['fullname'];
//             $address = $result['address'];
//             $tel = $result['tel'];
//             $membertype = $result['memberType'];
            
//             //คำสั่ง SQL สำหรับเพิ่มข้อมูลใน Database
//             $sql = "INSERT INTO `user` VALUES (NULL,'$memberID','$password','$fullname','$address','$tel','$membertype')";
//             $result = mysqli_query($link, $sql);
            
//             if ($result) {
//                 echo json_encode("status 200" );
//              } else {
//                 echo json_encode("status 404" );    
//              }
//         }
            
//     }





// 	//ตรวจสอบการเรียกใช้งานว่าเป็น Method PUT หรือไม่
// 	if($requestMethod == 'PUT'){
		
// 		//ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
// 		if(isset($_GET['id']) && !empty($_GET['id'])){
			
// 			$id = $_GET['id'];
			
//             $memberID = $result['memberid'];
//             $pw = $result['password'];
//             $fullname = $result['fullname'];
//             $address = $result['address'];
//             $tel = $result['tel'];
			
// 			//คำสั่ง SQL สำหรับแก้ไขข้อมูลใน Database โดยจะแก้ไขเฉพาะข้อมูลตามค่า id ที่ส่งมา
// 			$sql = "UPDATE user SET memberid='$memberID',password='$pw',fullname='$fullname',address='$address',tel='$tel' WHERE id=$id";

// 			$result = mysqli_query($link, $sql);
			
//             if ($result) {
//                 echo json_encode("status 200" );
//              } else {
//                 echo json_encode("status 404" );    
//              }
		
// 		}
			
// 	}


// //ตรวจสอบการเรียกใช้งานว่าเป็น Method DELETE หรือไม่
// if($requestMethod == 'DELETE'){
        
//     //ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
//     if(isset($_GET['id']) && !empty($_GET['id'])){
        
//         $id = $_GET['id'];
        
//         //คำสั่ง SQL สำหรับลบข้อมูลใน Database ตามค่า id ที่ส่งมา
//         $sql = "DELETE FROM user WHERE id = $id";

//         $result = mysqli_query($link, $sql);
        
//         if ($result) {
//             echo json_encode("status 200" );
//          } else {
//             echo json_encode("status 404" );    
//          }
//     }
        
// }
    