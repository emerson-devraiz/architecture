<?php

namespace architecture\interfaces;

interface FactoryControllerInterface
{
    public function manufacture(): ControllerInterface;
}