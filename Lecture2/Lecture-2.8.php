<?php
    $today = "Thứ Bảy";

    switch ($today) {
        case "Chủ Nhật":
            echo "Ngày cuối tuần.";
            break;

        case "Thứ Bảy":
            echo "Ngày cuối tuần.";
            break;

        case "Thứ Hai":
            echo "Ngày đầu tuần.";
            break;

        default:
            echo "Ngày trong tuần không phải là đầu tuần.";
            break;
    }
?>