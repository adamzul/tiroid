<?php

namespace app\models;
use app\models\TabelPegawai;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id_pegawai;
    public $role_pegawai;
    public $nama_pegawai;
    public $password;
    public $jenis_kelamin_pegawai;
    public $tanggal_lahir_pegawai;
    public $alamat_pegawai;
    public $no_telpon_pegawai;
    public $username_pegawai;
    public $password_pegawai;
    public $authKey;
    public $accessToken;

    


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = TabelPegawai::findOne($id);
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = TabelPegawai::find()->where(['accessToken'=>$token])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = TabelPegawai::find()->where(['username_pegawai'=>$username])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id_pegawai;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password_pegawai === md5($password);
    }
}
