<?php
$a =123;
$b=22;

$c=333;
$a=123;


?>

<!doctype html>
<html  ng-app="app">
<head>

    <style type="text/css">
        .expander{
            border:1px solid black ;
            width: 250px;
            background-color: red;
        }
        .expander >title{
            background-color:  black;
            color:white;
            padding: .1em .3em;
            cursor:pointer;
        }
        .expander >.body{
            padding: .1em .3em;
        }
        .title{
            background-color: red;
        }
        .closed{
            display: none;
        }

    </style>
</head>
<body >
<div >

    <div >
        <hello></hello>
    </div>

    <div >
Your name: <input type="text" ng-model="yourname" placeholder="World">
<hr>
Hello {{yourname || 'Worlaaad'}}!

<p>1 + 2 = {{ 1 + 2 }}</p>

<div ng-controller="CartController">
<h1>ORDER</h1>
<div ng-repeat="item in items">
    <span>{{item.title}}</span>
    <input ng-model="item.quantity" type="text"/>
    <span>{{item.price | currency}}</span>
    <span>{{item.price *item.quantity | currency}}</span>
    <button ng-click="remove($index)">remove</button>
</div>
</div>


<hr/>
<div ng-controller="PhoneListCtrl">

<ul>
    <li ng-repeat="phone in phones">
        {{phone.name}}
        <p>{{phone.snippet}}</p>
    </li>
</ul>
</div>

<hr/>
    </div>
<div ng-controller="SomeController">
    <expander class="expander" expander-title="title">{{text}}</expander>
</div>
<hr/>

    </div>





<script src="angular-1.0.1.min.js"></script>

<script>
    var appModule = angular.module('app', []);
    appModule.directive('hello', function() {
        return {
            restrict: 'E',
            template: '<div>Hi there</div>',
            replace: true
        };
    });

    appModule.controller(
      'CartController',function($scope){
          $scope.items=[
              {title:'123',quantity:8,price:3},
              {title:'2221223',quantity:8,price:3},
              {title:'1243',quantity:8,price:3},
          ];
          $scope.remove= function (index) {
              $scope.items.splice(index,1);
          }
      }

  );

    appModule.controller(
      'PhoneListCtrl',function ($scope) {
          $scope.phones = [
              {"name": "Nexus S",
                  "snippet": "Fast just got faster with Nexus S."},
              {"name": "Motorola XOOM™ with Wi-Fi",
                  "snippet": "The Next, Next Generation tablet."},
              {"name": "MOTOROLA XOOM™",
                  "snippet": "The Next, Next Generation tablet."}
          ];

      }
  );





    appModule
        .directive('expander', function () {
            return {
                restrict:'EA',
                replace:true,
                transclude:true,
                scope:{ title: '=expanderTitle'},
                template:'<div>'+
                '<div class="title"  ng-click="toggle()" > {{ title}}</div>'+
                '<div class="body" ng-show="showMe"  ng-transclude></div>'+
                '</div>',
                link:function(scope,element,attrs){
                    var titleElement=angular.element(element.children().eq(0));
                   var bodyElement=angular.element(element.children().eq(1));
                    scope.showMe=false;
                    scope.toggle = function toggle() {
                        scope.showMe = !scope.showMe;
                        console.log(titleElement.html());
                       console.log(bodyElement.html());
                        titleElement.addClass('ddd');
                        bodyElement.addClass('aaa');
                        bodyElement.addClass('ccc');
                    }

//俩种形式
//                    var titleElement=angular.element(element.children().eq(0));
//                    var bodyElement=angular.element(element.children().eq(1));
//                    titleElement.bind('click',toggle);
//                    scope.showMe=false;
//                    function toggle(){
//                        scope.showMe =!scope.showMe;
//                        console.log(titleElement.html());
//                        console.log(bodyElement.html());
//                        titleElement.addClass('ddd');
//                        bodyElement.addClass('aaa');
//                        bodyElement.addClass('ccc');
//                    }


                }
            }
        })

    appModule.controller(

        'SomeController', function ($scope) {
            $scope.title='click me to expand123';
            $scope.text='12311'+'876543333';
        }
    );



//    appModule
//        .directive('expander', function () {
//            return {
//                restrict:'E',
//                repalce:true,
//                transclude:true,
////                template:'<div>hi</div>'
////
//                scope:{ title: '=expanderTitle'},
//                template:'<div>'+'<div class="title" ng-click="toggle()"> {{ title}}</div>'+
//                    '<div class="body" ng-show="showMe" ng-transclude></div>'+
//                    '</div>',
//                link:function(scope,element,attr){
////                    var titleElement=angular.element(element.children().eq(0));
////                    var bodyElement=angular.element(element.children().eq(1));
////                    console.log(titleElement);
////                    console.log(bodyElement);
////                    titleElement.bind('click',toggle);
////                    function toggle(){
////                        alert(123);
////                        bodyElement.toggleClass('closed');
////                    }
//                scope.showMe=false;
//                scope.toggle=function toggle(){
//                    scope.showMe =!scope.showMe;
//                }
//            }
//            }
//        })


//
//    appModule
//        .directive('expander', function () {
//            return {
//                restrict:'E',
//                template:'<div>hi</div>',
//                repalce:true
//
//            }
//        })


</script>

</body>
</html>