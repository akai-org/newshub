<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function example() {
        $this->name = "Linux Kernel 4.19 LTS Release is Here!";
        $this->description = "If you’ve been waiting for a stable (and longterm) Kernel release now, Kernel 4.19 is here.";
        $this->url = "https://itsfoss.com/linux-kernel-4-19-lts-release/";
        $this->image = "https://4bds6hergc-flywheel.netdna-ssl.com/wp-content/uploads/2018/10/kernel-4-19-release-300x169.jpeg";
    }
}
