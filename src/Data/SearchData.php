<?php

namespace App\Data;

use App\Entity\Language;


class SearchData 
{

     /**
     * @var ?Language|null
     */
    

    private ?Language $language = null;



    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): self
    {
        $this->language = $language;

        return $this;
    }

}