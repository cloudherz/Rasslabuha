function getRand(min, max){
          return Math.round(Math.random()*(max-min))+min;
         }

         var images = new Array(
         "https://sun9-26.userapi.com/s/v1/if2/6MxyY7eIQM3bUi9nFEd2fIUH0mPNYuqHklvFFw_N9eQzF49pM5K--4gjnj_HGNnVv-xf_rjh5vkcwLEvNVmJimks.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-16.userapi.com/s/v1/if2/cgRVVOT6Slnuas_xPDEh4T2BV1yDeccHNYN7wV9cmP_--yrbO2YKR-t4vqw6z7EgvDw25sxot0T9MxqqCO12y0NW.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-15.userapi.com/s/v1/if2/ITLGXq1gjz5ecSG5_E2wfnRQQ6Gw-ohBy0skJh8QhLMqHcwI227EhVwHweUEokSUqL888PFkB6MCKCqw234fIVW1.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-42.userapi.com/s/v1/if2/Of7EWpPKmdtxbXewZgq7Wjjj3eTV2hFcn-RfEotXnw1YDVggB3Q2OzraQFkV3EV5ILsEqg1FZ7A44TywguDcyVF7.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-76.userapi.com/s/v1/if2/eoxNwtDXHIiikcbUUDnQbAuLMYgi_cSGxiL08shFcmc-U7llkNlaJkXM73Y40C072xLNw6MYBPDf5yHK4zrlQwnT.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-39.userapi.com/s/v1/if2/rbcBLDe9jowBpMK3vA3RSGnvIRQs3HIR1VOPz0_ZPwpv3FJ95EKMNd0UbnVKUijP7w00SX0FKX1xZTxiSRIpgq3P.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-68.userapi.com/s/v1/if2/TFZNVZjNcf7cYcB2XZWy74nexIF9263BMLSYmwBj_OGHHVHxHFFZ-UvYcZ63etUDOVRrg1v3h1XDCxQUWMJY2abm.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-42.userapi.com/s/v1/if2/VWMXX_caMtJivULB6tyE4ZA2BkCx57xwkZZAegrlCjpUyPKXInYx7VDYAMfhBCszSkRaQ6Xe3OYkfAV7JKQP-VgL.jpg?size=1920x1053&quality=95&type=album",
         "https://sun9-33.userapi.com/s/v1/if2/z6USryReDvNVThKyXDjXOOIbYcjugAdSc_6RbjlGDA9CoLBVoxD890C_8g9Tgslu6hndFFzkpTp9eZU15T4nyMYA.jpg?size=1920x1053&quality=95&type=album"
         );
         var lo = 0;
         var hi = images.length-1;
         var num = getRand(lo, hi);
         console.log(num);
         var page = document.getElementsByClassName("page");
         page[0].style.backgroundImage = "url("+images[num]+")";
