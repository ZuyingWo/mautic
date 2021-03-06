<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

$view->extend('MauticCoreBundle:Default:content.html.php');
$view['slots']->set('mauticContent', 'report');

$header = ($report->getId()) ?
    $view['translator']->trans('mautic.report.report.header.edit',
        array('%name%' => $view['translator']->trans($report->getName()))) :
    $view['translator']->trans('mautic.report.report.header.new');

$view['slots']->set("headerTitle", $header);

$showGraphTab = count($form['graphs']->vars['choices']);
?>

<?php echo $view['form']->start($form); ?>
<div class="box-layout">
    <div class="col-md-9 bg-white height-auto">
        <div class="row">
            <div class="col-xs-12">
                <!-- tabs controls -->
                <ul class="bg-auto nav nav-tabs pr-md pl-md">
                    <li class="active">
                        <a href="#details-container" role="tab" data-toggle="tab"><?php echo $view['translator']->trans('mautic.core.details'); ?></a>
                    </li>
                    <li class="">
                        <a href="#data-container" role="tab" data-toggle="tab"><?php echo $view['translator']->trans('mautic.report.tab.data'); ?></a>
                    </li>
                    <li class="<?php if (!$showGraphTab) echo "hide"; ?>" id="graphs-tab">
                        <a href="#graphs-container" role="tab" data-toggle="tab"><?php echo $view['translator']->trans('mautic.report.tab.graphs'); ?></a>
                    </li>
                </ul>
                <!--/ tabs controls -->

                <div class="tab-content pa-md">
                    <div class="tab-pane fade in active bdr-w-0" id="details-container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pa-md">
                                    <?php echo $view['form']->row($form['name']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pa-md">
                                    <?php echo $view['form']->row($form['source']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pa-md">
                                    <?php echo $view['form']->row($form['description']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade bdr-w-0" id="data-container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pa-md">
                                    <h4><strong><?php echo $view['translator']->trans('mautic.report.report.form.columnselector'); ?></strong></h4>
                                    <?php echo $view['form']->row($form['columns']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="pa-md">
                                    <h4><strong><?php echo $view['translator']->trans('mautic.core.order'); ?></strong></h4>
                                    <?php echo $view['form']->row($form['tableOrder']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pa-md">
                                    <h4><strong><?php echo $view['translator']->trans('mautic.core.filters'); ?></strong></h4>
                                    <?php echo $view['form']->row($form['filters']); ?>
                                </div>
                                <div class="hide">
                                    <div id="filterValueYesNoTemplate">
                                        <?php echo $view['form']->widget($form['value_template_yesno']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade bdr-w-0<?php if (!$showGraphTab) echo "hide"; ?>" id="graphs-container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="pa-md">
                                    <?php echo $view['form']->row($form['graphs']); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 bg-white height-auto bdr-l">
        <div class="pr-lg pl-lg pt-md pb-md">
            <?php echo $view['form']->row($form['isPublished']); ?>
            <?php echo $view['form']->row($form['system']); ?>
        </div>
    </div>
</div>
<?php echo $view['form']->end($form); ?>