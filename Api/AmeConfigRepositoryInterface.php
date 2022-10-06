<?php
/**
 * @author Gustavo Ulyssea - gustavo.ulyssea@gmail.com
 * @copyright Copyright (c) 2020-2022 GumNet (https://gum.net.br)
 * @package GumNet AME
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY GUM Net (https://gum.net.br). AND CONTRIBUTORS
 * ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED
 * TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL THE FOUNDATION OR CONTRIBUTORS
 * BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

declare(strict_types=1);

namespace GumNet\AME\Api;

use GumNet\AME\Api\Data\AmeConfigInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface AmeConfigRepositoryInterface
{
    /**
     * Persist AmeConfig to database
     *
     * @param AmeConfigInterface $ameConfig
     * @throws LocalizedException
     * @return AmeConfigInterface
     */
    public function save(AmeConfigInterface $ameConfig): AmeConfigInterface;

    /**
     * Get AmeConfig through entity id
     *
     * @param int $id
     * @throws NoSuchEntityException
     * @return AmeConfigInterface
     */
    public function get(int $id): ?AmeConfigInterface;

    /**
     * Get WallAmeConfigetBalance through config
     *
     * @param string $config
     * @throws NoSuchEntityException
     * @return AmeConfigInterface
     */
    public function getByConfig(string $config): ?AmeConfigInterface;
}
