


<html ng-app='expanderModule'>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <script src="angular-1.0.1.min.js"></script>
</head>
<body>
<div ng-controller='SomeController'>
    <expander class='expander' expander-title='title'>
        {{text}}
    </expander>
</div>
</body>
<script src="ExpanderSimple.js"></script>
</html>

<style>
.expander {
border: 1px solid black;
width: 250px;
}

.expander>.title {
background-color: black;
color: white;
padding: .1em .3em;
cursor: pointer;
}

.expander>.body {
padding: .1em .3em;
}
    </style>



<script>
    var expanderModule=angular.module('expanderModule', [])
    expanderModule.directive('expander', function() {
        return {
            restrict : 'EA',
            replace : true,
            transclude : true,
            scope : {
                title : '=expanderTitle'
            },
            template : '<div>'
            + '<div class="title" ng-click="toggle()">{{title}}</div>'
            + '<div class="body" ng-show="showMe" ng-transclude></div>'
            + '</div>',
            link : function(scope, element, attrs) {
                scope.showMe = false;
                scope.toggle = function toggle() {
                    scope.showMe = !scope.showMe;
                }
            }
        }
    });
    expanderModule.controller('SomeController',function($scope) {
        $scope.title = '123';
        $scope.text = '4444444';
    });
</script>