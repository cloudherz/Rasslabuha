function getRand(min, max){
            return Math.round(Math.random()*(max-min))+min;
        }

        let imagesA = new Array(
            "https://sun9-39.userapi.com/s/v1/if2/QlipGmQbKQyLV0AnqLl0TnOeXen6aRHSrfzlOaDwe2607k8sRcojlKOBpB2FClDqfyYv85hOQfT025HMPpW-pyQX.jpg?size=900x900&quality=95&type=album",
            "https://sun9-65.userapi.com/s/v1/if2/5vB8tT9oAvbqwRacpbW-MtS7xQjAWOqeJlkZB2uMNsi9r4dL2JJtjVGeUvTwtHpQycap3NWqppU3QKn4UPNr8rNj.jpg?size=500x500&quality=95&type=album",
            "https://sun9-47.userapi.com/s/v1/if2/MqV5Pc5Q5I6QW4JYOZoOFogc-hnIWdp3cg7cqxPhUh-5vDoJo7_HFy6W3ZbuStQRVDn6jG6nCeP0VJZpesz6uncI.jpg?size=750x685&quality=95&type=album",
            "https://sun9-15.userapi.com/s/v1/if2/M4b4GyDHnr7zASxsQGZatAciWnFdagIiWz_hpmfqYBPDAE2KLGkUFyrLtryHe071MjDs-WI1pLDRLZ1M20NMfrkd.jpg?size=750x685&quality=95&type=album",
            "https://sun9-14.userapi.com/s/v1/if2/pdNLyebtKinEYy6OuK6GVvsavyNxZM2hBeGYif4-L_RYDXBcnjB22bgPv-nh4s6KCvzW0f7MC0khA-Q33yAUKEz-.jpg?size=720x722&quality=95&type=album",
            "https://sun9-70.userapi.com/s/v1/if2/EqfllTbYOEGBcLMnQApSuV6LOcIiOFUIbl0FjIAMUiORfIrNAOxR0o9WE15fdEfctgQltBrqg5FJAXuyzeISNCcG.jpg?size=750x685&quality=95&type=album",
            "https://sun9-11.userapi.com/s/v1/if2/vQyl2STv4P-31DcnNmxbWPwSYRpXxZiYs2HymwZ5NlliA_0omsaAlOH_xXstMRGtSQ04wV4Bu4ML1p8PpMyhacq6.jpg?size=360x329&quality=95&type=album",
            "https://sun9-80.userapi.com/s/v1/if2/ZObeZlbdQljXoD9WTdbTdJk5ZnHAHZFPFhdqsLsIpdrc30N7bGVRiBuGaG_CxB2T8ortrBd_ydS-AVfhk27XArw0.jpg?size=750x685&quality=95&type=album",
            "https://sun9-77.userapi.com/s/v1/if2/iuVzYR6-bue-XwQVsz7FDxya5yAHCvrDnxM-wfYzz_5n_MCXYVvY7TM0PgDe_bhvsThhCKjROOxW2TneYbNjd2QU.jpg?size=750x685&quality=95&type=album",
            "https://sun9-10.userapi.com/s/v1/if2/hK_ebsu3PRYjsOhDG2YsOgOHE2sHETNjHVqoAjyABnYiu1DBYOoJEygURaFP8Ps8UGmfUtKRcMKKEOjXevjIxEFy.jpg?size=900x900&quality=95&type=album",
            "https://sun9-12.userapi.com/s/v1/if2/F6Mw-3jIiEuepvXn1SjKfB5tOiwIDx6XoquC-lLg0HN6VrKWMy-IgnrGQaoE23v-2auhORxIVhVI9mSqoA4GuTD5.jpg?size=788x720&quality=95&type=album",
            "https://sun9-59.userapi.com/s/v1/if2/_WvquOdH663bLtXRp7fvzsCusbEiVntSU3JIjxnv_rTBJHHNF8WBfrX86UrYi4Pa99tPggxL3z2_fEgQnzHZCnBw.jpg?size=750x685&quality=95&type=album",
            "https://sun9-81.userapi.com/s/v1/if2/voQx1J4Fxf_oFpPtX27KtBgD9gu2agTyhBGSUNXCytpEP97vsVcm6Y4iWvk3NB2crHjyFs4FUiJgOBkJLtFsX1dZ.jpg?size=1080x1080&quality=95&type=album",
            "https://sun9-10.userapi.com/impf/RwiCoFy6gppK2V7Kr3xDEr_vBmYlg7mYsAtNgQ/zPWpOGAC4xk.jpg?size=2160x2160&quality=95&sign=78255025bf5dea38b948e7430bd07209&type=album"
        );
        let loA = 0;
        let hiA = imagesA.length-1;
        let numA = getRand(loA, hiA);
        console.log(numA);


        let imgA = document.createElement('img');

        imgA.id = "id";
        imgA.src = imagesA[numA];
        imgA.style = "width:400px";
        imgA.style = "height:400px";

        imgA.className = "error_img";

        document.body.appendChild(imgA);
        section.append(document.body.appendChild(imgA));




