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

namespace GumNet\AME\Plugin;

use Magento\Catalog\Model\Product;
use Magento\Framework\View\Element\Template;
use GumNet\AME\Values\Config;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ProductListPlugin
{
    /**
     * @var Template
     */
    protected $template;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param Template $template
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Template $template,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->template = $template;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param \Magento\Catalog\Block\Product\ListProduct $subject
     * @param string $result
     * @param Product $product
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function afterGetProductPrice(
        \Magento\Catalog\Block\Product\ListProduct $subject,
        string $result,
        Product $product
    ): string {
        if (!$this->scopeConfig->getValue(Config::EXHIBITION_LIST, ScopeInterface::SCOPE_STORE)) {
            return $result;
        }
        $html = $this->template->getLayout()->createBlock('GumNet\AME\Block\CashbackText')->setKey($product)
            ->setName('cashback_list')
            ->setTemplate('GumNet_AME::cashbacktext.phtml')->toHtml();

        return $result . $html;
    }
}
