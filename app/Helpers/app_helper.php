<?php
function nilaiSikap($angka)
{
    if ($angka >= 80 && $angka <= 100) {
        return "Sangat Baik";
    } else if ($angka >= 70 && $angka <= 79) {
        return "Baik";
    } else if ($angka >= 60 && $angka <= 69) {
        return "Cukup";
    } else {
        return "Kurang";
    }
}
