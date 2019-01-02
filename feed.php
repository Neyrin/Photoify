<!-- 
 Get array from database to render out card 
     $stmt = $pdo->prepare('SELECT * FROM posts'); 
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');

    $posts = json_encode($result);
?>  -->
