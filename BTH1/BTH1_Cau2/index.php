<?php
// Đọc file questions.txt
$filename = "Quiz.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current_question = [];
$parsed_questions = [];

// Duyệt qua từng dòng trong tệp
foreach ($questions as $line) {
    if (strpos($line, "Câu") === 0) {
        if (!empty($current_question)) {
            $parsed_questions[] = $current_question; // Lưu câu hỏi đã đọc
        }
        $current_question = []; // Bắt đầu câu hỏi mới
    }
    $current_question[] = $line; // Thêm dòng hiện tại vào câu hỏi
}

// Lưu câu hỏi cuối cùng
if (!empty($current_question)) {
    $parsed_questions[] = $current_question;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-3">Bài Thi Trắc Nghiệm</h1>
    <form action="result.php" method="POST">
        <?php
        foreach ($parsed_questions as $index => $question) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-header'><strong>" . htmlspecialchars($question[0]) . "</strong></div>";
            echo "<div class='card-body'>";

            for ($i = 1; $i <= 4; $i++) { 
                $answer = substr($question[$i], 0, 1); // A, B, C, D
                $answerText = htmlspecialchars($question[$i]);
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question" . ($index + 1) . "' value='{$answer}' id='question" . ($index + 1) . "{$answer}'>";
                echo "<label class='form-check-label' for='question" . ($index + 1) . "{$answer}'>{$answerText}</label>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
        }
        ?>
        <button type="submit" class="btn btn-warning mb-4">Nộp bài</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
