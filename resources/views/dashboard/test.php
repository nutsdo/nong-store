
<div ng-controller="AlertDemoCtrl">
    <alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
    <button type="button" class='btn btn-default' ng-click="addAlert()">Add Alert</button>
</div>