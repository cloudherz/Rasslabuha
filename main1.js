function getRand(min, max){
          return Math.round(Math.random()*(max-min))+min;
         }

         var images = new Array(
             "https://sun9-25.userapi.com/impf/7LB8478lsDxOcsRztyWhYgNd0egl5_qqb-5pQQ/8VVd4D8fKmc.jpg?size=1920x1080&quality=95&sign=72ce71d737a8071fe2ca272761b344f9&type=album",
             "https://sun9-50.userapi.com/impf/02ZRrF63Qbewep1Wa8B5qDVD15zdzuDhN02BCg/-iTCP1h9viQ.jpg?size=1920x1080&quality=95&sign=d43dfd96dbac1b4d40394cda9902ff1b&type=album",
             "https://sun9-60.userapi.com/impf/QkQTaks3uWPUP22rhALyQ9c0-UeUakNSSMfA3w/zDspKQyXe1w.jpg?size=1920x1080&quality=95&sign=78f26295e45dd207f2f454ecd9209673&type=album",
             "https://sun9-45.userapi.com/impf/dsUmobSz8o69Oa2TT3FNzgtZGJ3mqaJjxRrObQ/_JlFhvoYF5o.jpg?size=1920x1080&quality=95&sign=8f1f59e1f556c88b626d22746752c6d6&type=album",
             "https://sun9-20.userapi.com/impf/ExnOFrZsfuicoX8KaAldKiFapP8LesV6oiY4wg/BEVW-mwXbds.jpg?size=1920x1080&quality=95&sign=65757f704d7ebe7578baad2fe30340a9&type=album",
             "https://sun9-66.userapi.com/impf/Zq2nWf3jnIk58Xq9QCLHKkhOdEEuC4X2Su8-sw/Ek663bwOPYg.jpg?size=1920x1080&quality=95&sign=3c403e99e1c586f0de8cbe4d37f45484&type=album",
             "https://sun9-16.userapi.com/impf/HjPzLdEEIxDqiykMzdZ6GpIaLBuK9gMkF0atww/kBOvFFyYGrk.jpg?size=1920x1080&quality=95&sign=973d66351f3064f06e34c76b0aa9b8c5&type=album",
             "https://sun9-54.userapi.com/impf/2AcX-_m_tWuh1vfRZIO4K3Hz6Ivm-7aFIjkcmw/HFfUtKLA-Ms.jpg?size=1920x1080&quality=95&sign=6768f5f26ed0e1fec99444a8b4ea4cc2&type=album",
             "https://sun9-35.userapi.com/impf/i2xVDcDEyGVmq7JEiYA64sZaTh5QWPb_MSKJYA/wnFsd3mmRb4.jpg?size=1920x1080&quality=95&sign=2a3a36350a5ecc9843dde6641ddf7fc4&type=album",
             "https://sun9-47.userapi.com/impf/DQVnHdTR10dLznFMqVVv-vieJNsbvcK2rYIAKg/G2vKXtr4CwA.jpg?size=1920x1080&quality=95&sign=750713acc65a6be90cb4989d55a00c2f&type=album",
             "https://sun9-57.userapi.com/impf/-WYXWNfknTOFjpijwFIU4MAbzRKNLVPtzpiT0Q/hznnqeeBl3Y.jpg?size=1920x1080&quality=95&sign=37483c1e79be53f5dce38e78c21707a4&type=album",
             "https://sun9-26.userapi.com/impf/g5-mqEftriIn4ANieVVpDnrdeNU7nZIoc4R2Eg/0nMUdUPAUO8.jpg?size=1920x1080&quality=95&sign=232835c43b8e96b757977b271150b8e4&type=album",
             "https://sun9-45.userapi.com/impf/u4JZtQtsIx1TRZSXDWVJnpTN2CftNySs9sVAqw/K4ZhEbFJyN4.jpg?size=1920x1080&quality=95&sign=facce8e6fdfbe53baa4e970feba1c30c&type=album",
             "https://sun9-13.userapi.com/impf/p7cGHqogwA0ktEHZpdbPlaUvxUhmk8UtDTsuAg/Bdt70rlj7xY.jpg?size=1920x1080&quality=95&sign=3d6e75bc4cc61f92356e68fbebd8fe8e&type=album",
             "https://sun9-41.userapi.com/impf/O5jPTGHa6C9u0yTKlPmMVC4eihKcJsLnZqawfg/bIAHk1ZPwic.jpg?size=1920x1080&quality=95&sign=4cd50be051bbfacf17b5c36c6ff9b01e&type=album",
             "https://sun9-47.userapi.com/impf/Y90DUJNbkV7Cng5I4FerkUjbeAgl8yRF-NjTNg/tChwbPoZFtE.jpg?size=1920x1080&quality=95&sign=e5e192783494cfa8ce058b6a577ca12f&type=album",
             "https://sun9-84.userapi.com/impf/c-izzqB3p4DQ5Ec6NR0uZkSjxJfyuInkVA8srw/x7Igtvxldq4.jpg?size=1920x1080&quality=95&sign=2a6d48422b77773d9e0a14f965d457e7&type=album",
             "https://sun9-79.userapi.com/impf/CKX_c2YkIyvl4m07XIOSNuYEj5Hbz5zZmGtM6A/Wv2_mSiWCuc.jpg?size=1920x1080&quality=95&sign=ef968116b7ce820fcf27a991e410f2a8&type=album",
             "https://sun9-72.userapi.com/impf/UpKQsujpuGVViXuIImrFQTcG44idOY5NYEaW6A/_5KQMKMEbIo.jpg?size=1920x1080&quality=95&sign=2a9172fa1f619f6cdc01db00dbd12eb7&type=album",
             "https://sun9-72.userapi.com/impf/na44Dw2wQtFkNc6fEGUgHDGvYAJgmykybmHWug/5ZnuSIx5XUo.jpg?size=1920x1080&quality=95&sign=dac23137dec6060553d7036933fca1ec&type=album",
             "https://sun9-38.userapi.com/impf/8ZN7u_QQLXquQkB0xcmtg5sQWCgsHYRI7m_eDw/spuCo_n3b-s.jpg?size=1920x1080&quality=95&sign=a4ab238553d1dce95b71593e3c3d4f09&type=album",
             "https://sun9-25.userapi.com/impf/l0OBikAHv8ds2xgMt8jnO76y0lBpcG6q27zFew/gy4O3UVXLL8.jpg?size=1920x1080&quality=95&sign=0744f8a3b2139f213ef27c9ccd7cad9e&type=album",
             "https://sun9-51.userapi.com/impf/kdO4jidJTgf1InXFD2IiVtPO2AvmJWGY8-5sQQ/L9WTlhS61Cg.jpg?size=1920x1080&quality=95&sign=a544abc5fee5b84dd0e809b6683e63a1&type=album",
             "https://sun9-61.userapi.com/impf/zBF8CYLWKQri6Thq06lcS8IyYLMzG-H62AyYEw/sURcKuKXe84.jpg?size=1920x1017&quality=95&sign=d81f892a70e140e9dd2e03571ffc5977&type=album",
             "https://sun9-39.userapi.com/impf/8_rt66g_H6rxoGnSWhmVLMZV37DqbTJaJtlHMw/dWO-pTVnK9M.jpg?size=1920x1017&quality=95&sign=10917926cb5f478e82298d641257546f&type=album",
             "https://sun9-16.userapi.com/impf/kGCbXC8gPaaISEGoOaGfFLz2yp7Fy-aa4uVCDQ/HLHGR8mSXjc.jpg?size=1920x1017&quality=95&sign=a4444528b22505eff5e58a712e65ed35&type=album",
             "https://sun9-21.userapi.com/impf/DGfMSHwRgv_oilIpm3sLRDP0fc89VCMGHy8Pyw/8eTr1Lm4ozU.jpg?size=1920x1017&quality=95&sign=bd88b283fc61d52ab39d1b5c0e11acad&type=album",
             "https://sun9-86.userapi.com/impf/BcC4IuNlHe0cgUTkMK-2Vb_31mT47hl-HmzXfQ/PsFKz1dNsnE.jpg?size=1920x1017&quality=95&sign=965f01bdbfa02568f4a6dce189a82926&type=album",
             "https://sun9-78.userapi.com/impf/prPeTBrh2ZGno5VpLN7DAlLegOQjc9pPgLUSNQ/HzVpa5dSsGg.jpg?size=1920x1017&quality=95&sign=a3f346d384da523e989e27060ca43a67&type=album",
             "https://sun9-66.userapi.com/impf/nNP-oQ-XdEawqeiIdEltLZE_NVrLg8Ssld8YpA/mVCs08bPYPc.jpg?size=1920x1017&quality=95&sign=ef3fe6eee03f0f81f272f1744bc8dc0c&type=album",
             "https://sun9-64.userapi.com/impf/lJVcfzC6vyLquXMoCuAw8pjbHzcX8fNkbBSSSA/c6ayfy4507M.jpg?size=1920x1017&quality=95&sign=e30a9d8515f9e04821ca2fc92085a9f1&type=album",
             "https://sun9-1.userapi.com/impf/q0uI-o5LdcodVfGIo-infSlOCgPJXKtxfSgqPQ/pugMruv0XCk.jpg?size=1920x1017&quality=95&sign=ea4a9b9bd6590c133b62f9cc55d4aac3&type=album",
             "https://sun9-62.userapi.com/impf/b08lvCOgu99JZCFZKs_1LeKQ5eBcdOQERiyoLg/OzcqD8Bj-Ow.jpg?size=1920x1017&quality=95&sign=a26944d4256f310a8fc8e09b9cf31a58&type=album",
             "https://sun9-43.userapi.com/impf/-eF0-WeCIuArUoW6Lp2jXOKJTwYGdRPCEPHtQQ/V3oKp6GCwvg.jpg?size=1920x1017&quality=95&sign=7140cbc2ee95dfebdd547aebb90b3dce&type=album"
         );
         var lo = 0;
         var hi = images.length-1;
         var num = getRand(lo, hi);
         console.log(num);
         var page = document.getElementsByClassName("page");
         page[0].style.backgroundImage = "url("+images[num]+")";
