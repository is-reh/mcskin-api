<?php

/**
 * Class MinecraftReH
 * @author isReH Software Services
 * @version 1.0 Beta
 * @since 2021.04.25
 * @contact Whatsapp +90 551 07 09 435
 */

class MinecraftReH
{
    public function getUUID($username){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mojang.com/users/profiles/minecraft/{$username}?at=").time();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
            return json_decode($result)->id;
        }
        curl_close($ch);
    }

    public function RenderUUID($username){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mojang.com/users/profiles/minecraft/{$username}?at=").time();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
            return $result;
        }
        curl_close($ch);
    }

    public function NameHistory($getUUID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.mojang.com/user/profiles/{$getUUID}/names");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
            return $result;
        }
        curl_close($ch);
    }

    public function Render3DHead($UUID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://crafatar.com/renders/head/{$UUID}?overlay=true");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
            return base64_encode($result);
        }
        curl_close($ch);
    }

    public function Render3DAvatar($UUID,$overlay="true"){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://crafatar.com/avatars/{$UUID}?size=512&overlay=$overlay");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
            return base64_encode($result);
        }
        curl_close($ch);
    }

    public function Render3DSkin($UUID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://crafatar.com/renders/body/{$UUID}?overlay=true");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
            return base64_encode($result);
        }
        curl_close($ch);
    }

    public function UrlTo64($URL){
        if($URL != null) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $URL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            } else {
                return base64_encode($result);
            }
            curl_close($ch);
        }
    }

    public function getData($username){
        $getUUID = $this->getUUID($username);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sessionserver.mojang.com/session/minecraft/profile/{$getUUID}?unsigned=false");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }else{
            $properties = json_decode($result)->properties;
            $value = base64_decode($properties[0]->value);
            $valueDecode = json_decode($value);
            $LastNameDecode = json_decode($this->NameHistory($valueDecode->profileId));
            $RenderHead = $this->Render3DHead($valueDecode->profileId);
            $RenderSkin = $this->Render3DSkin($valueDecode->profileId);
            $RenderAvatarOverlay = $this->Render3DAvatar($valueDecode->profileId,"true");
            $RenderAvatar = $this->Render3DAvatar($valueDecode->profileId,"false");
            if(!empty($valueDecode->profileName)) {
                $CostumData = array(
                    "status" => "good",
                    "message" => "www.yazilimcin.net",
                    "UUID" => $valueDecode->profileId,
                    "username" => $valueDecode->profileName,
                    "signature" => $properties[0]->signature,
                    "SkinURL" => $this->UrlTo64($valueDecode->textures->SKIN->url),
                    "CapeURL" => $this->UrlTo64($valueDecode->textures->CAPE->url),
                    "SkullCode" => array(
                        "V113" => "/give @p minecraft:player_head{SkullOwner:'{$valueDecode->profileName}'}",
                        "V112" => "/give @p minecraft:skull 1 3 {SkullOwner:'{$valueDecode->profileName}'}",
                    ),
                    "LastName" => $LastNameDecode,
                    "RenderData" => array(
                        "Avatar" => $RenderAvatar,
                        "AvatarOverlay" => $RenderAvatarOverlay,
                        "Head" => $RenderHead,
                        "Body" => $RenderSkin
                    )
                );
            }else{
                $CostumData = array(
                    "status" => "bad",
                    "message" => "No data found for this username"
                );
            }
            return json_encode($CostumData);
        }
        curl_close($ch);
    }

}