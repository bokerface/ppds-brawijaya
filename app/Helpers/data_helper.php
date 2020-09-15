<?php

function user_nama_lengkap()
{
    $db      = \Config\Database::connect();
    $builder = $db->table('ci_users');

    $query = $builder->getWhere(['id' => session('user_id')])->getRowObject();
    return $query->nama_lengkap;
}
