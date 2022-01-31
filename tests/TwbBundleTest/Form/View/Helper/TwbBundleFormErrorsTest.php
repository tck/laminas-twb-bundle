<?php

namespace TwbBundleTest\Form\View\Helper;

use Laminas\Form\Form;
use TwbBundle\Form\View\Helper\TwbBundleFormErrors;

class TwbBundleFormErrorsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Contains an instance of TwbBundleFormErrors.
     * @var \TwbBundle\Form\View\Helper\TwbBundleFormErrors
     */
    protected $formErrorsHelper = null;

    public function setUp()
    {
        $this->getFormErrorsHelper();
    }

    /**
     * Enforces that the correct helpers is being initialised.
     *
     * @param \TwbBundle\Form\View\Helper\TwbBundleFormErrors $oFormErrorsHelper
     *
     * @return \TwbBundleTest\Form\View\Helper\TwbBundleFormErrorsTest
     */
    public function setFormErrorsHelper(\TwbBundle\Form\View\Helper\TwbBundleFormErrors $oFormErrorsHelper = null)
    {
        $this->formErrorsHelper = $oFormErrorsHelper;

        return $this;
    }

    /**
     * Gets or initialises the correct helper for this test.
     * @return \TwbBundle\Form\View\Helper\TwbBundleFormErrors
     */
    public function getFormErrorsHelper()
    {
        if (null === $this->formErrorsHelper) {
            $oViewHelperPluginManager = \TwbBundleTest\Bootstrap::getServiceManager()->get('ViewHelperManager');
            $oRenderer = new \Laminas\View\Renderer\PhpRenderer();
            $oRenderer->setResolver(\TwbBundleTest\Bootstrap::getServiceManager()->get('ViewResolver'));
            $helper = $oViewHelperPluginManager->get('formErrors')
                ->setView($oRenderer->setHelperPluginManager($oViewHelperPluginManager));

            $this->setFormErrorsHelper($helper);
        }

        return $this->formErrorsHelper;
    }

    public function testInvokeWithoutFormReturnsObject()
    {
        $oHelper = $this->getFormErrorsHelper();
        $this->assertInstanceOf('TwbBundle\Form\View\Helper\TwbBundleFormErrors', $oHelper());
    }
}
