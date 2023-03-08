<?php

namespace architecture\valueobjects\document;

interface DocumentInterface
{
    public function getType(): string;
    public function getDocument(): string;
}