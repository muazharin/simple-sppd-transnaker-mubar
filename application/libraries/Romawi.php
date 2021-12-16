<?php

class Romawi
{
    public function bulan($no)
    {
        switch ($no) {
            case 1:
                $bulan = "I";
                break;
            case 2:
                $bulan = "II";
                break;
            case 3:
                $bulan = "III";
                break;
            case 4:
                $bulan = "IV";
                break;
            case 5:
                $bulan = "V";
                break;
            case 6:
                $bulan = "VI";
                break;
            case 7:
                $bulan = "VII";
                break;
            case 8:
                $bulan = "VIII";
                break;
            case 9:
                $bulan = "IX";
                break;
            case 10:
                $bulan = "X";
                break;
            case 11:
                $bulan = "XI";
                break;
            case 12:
                $bulan = "XII";
                break;
            default:
                $bulan = "";
                break;
        }

        return $bulan;
    }
}