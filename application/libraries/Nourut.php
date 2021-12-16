<?php

class Nourut
{
    public function no_urut($no)
    {
        if ($no < 10) {
            $no_urut = '10000' . $no;
        } else if ($no >= 10 && $no < 100) {
            $no_urut = '1000' . $no;
        } else if ($no >= 100 && $no < 1000) {
            $no_urut = '100' . $no;
        } else if ($no >= 1000 && $no < 10000) {
            $no_urut = '10' . $no;
        } else if ($no >= 10000 && $no < 100000) {
            $no_urut = '1' . $no;
        } else {
            $no_urut = '';
        }

        return $no_urut;
    }

	public function no_urut_quo($no)
    {
        if ($no < 10) {
            return '100' . $no;
        }
        return '10'.$no;
    }
}
