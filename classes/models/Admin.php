<?php

class Admin extends User
{
    public function getRole(): string
    {
        return 'admin';
    }
}
