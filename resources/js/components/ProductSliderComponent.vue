<template>
    <div>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="searchbar">
                <input v-model="search" class="search_input" type="text" name="" placeholder="Szukaj...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </div>
    <v-card>
        <v-container
            id="scroll-target"
            fluid
            grid-list-lg
            class="scroll-y"
            style="max-height: 600px"

        >
            <v-layout row wrap
            >
                <v-flex v-for="game in gameResults" v-if="games" xs12>
                    <v-card color="#353b48" class="white--text">
                        <v-layout row>
                            <v-flex xs7>
                                <v-card-title primary-title>
                                    <div>
                                        <div class="headline"><a STYLE="color: yellow" href="#" >{{ game.title }}</a></div>
                                    </div>
                                </v-card-title>
                            </v-flex>
                            <v-flex xs5>
                                <v-img
                                    :src="game.image"
                                    height="125px"
                                    contain

                                ></v-img>
                            </v-flex>
                        </v-layout>
                        <v-divider light></v-divider>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-container>
    </v-card>
    </div>
</template>
<script>
    export default {
        data() {
            return {

                games: [
                    {
                        title: 'WIEDŹMIN 3',
                        image: 'https://vignette.wikia.nocookie.net/wiedzmin/images/b/b7/Wied%C5%BAmin_3_Dziki_Gon_ok%C5%82adka.jpg/revision/latest/scale-to-width-down/340?cb=20160104182402'
                    },
                    {
                        title: 'DOOM',
                        image: 'https://gfx.antyradio.pl/var/antyradio/storage/images/media/images/foto-materialy-prasowe270/598465-1-pol-PL/foto-materialy-prasowe.png'
                    },
                    {
                        title: 'BATTLEFIELD 1',
                        image: 'https://d.allegroimg.com/original/0c8297/f8632b684834b225a30349923b0d'
                    },
                    {
                        title: 'GTA 5',
                        image: 'http://img6.gram.pl/20130402173403.jpg'
                    },
                    {
                        title: 'CALL OF DUTY BLACK OPS 3',
                        image: 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6216/6216334_sd.jpg;maxHeight=640;maxWidth=550'
                    },
                    {
                        title: 'CS GO',
                        image: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxITEBUTEhIVFRUQEhAQFRAVEBAQDxAQFRUWFhURFRUYHSggGBolGxUVITEhJSkrLi8uFyAzODMtOCgtLisBCgoKDg0OFQ8PFS0ZFR0rKysrKysrLS0rKys3LS0rKzctLSsrLS03Ny0tKystLS0tNysrLS0rLSsrKysrNysrK//AABEIAQkAvgMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAACAAEDBAUGBwj/xABTEAACAgECAwUDBQkKCQ0AAAABAgADEQQSBSExBhNBUWEHInEUMlKBkRcjM0KUobHR0hUkVGJzk7LB0/AlNVVldKOks/EWNENERVNygpKiw+Hj/8QAGQEBAQEBAQEAAAAAAAAAAAAAAAECAwUE/8QAIBEBAQEBAAIBBQEAAAAAAAAAAAERAhIhAxMxMkFhFP/aAAwDAQACEQMRAD8A9wnmmo9qFgu1NdfDrbV0RYW2LdXhVH42DjynpHer9IfaJ5fw32Yq2s1duscNXqH31LVqLK2wSdwsxgMOnLnAu2+1Op00w0mmt1F+tRrE04K1msK7oQ7c+e5H6Z5LmTVe0NjRa1mjspupuppam1tlZNrhA4txggE8/hK3G+w1leq02r4W9NT6Wn5ONPbypesF+e4ZIP3x8+cs6XgHEX09/wAr1VNtuodClHJtLp1DAkqSAWOPOBFV7SsulZ0pD3HuqsXKyW6ldQlFtSMBzCh+83fRByBiafZftt8q1PctSE3/ACk1utotBFFndtvAA2Ek5HnBThGpB0eDpwNME7w4UBbCw75lAHMNXkDphsHnC7McI1NOpZ7DpxW4sP3tVWxizblLnAzjJAxA7Iz5R4mf8J6j/T9X/vnn09xfjNGmqa261FVAWOWXLYGcKM8z6T5YTUG7VtbjBtutvK/R3u7kfnx9Uz3+NWN7MTGMTBE8yqM+sZT6xogZAcWYAjkwC3REwcxAQCzEx/NBjwHJizBBxHlDkwGJEIRGAKPJMyNBCgZGl0DrYrP76qQWTvmXcJo3isj3dMFbDj/nVjIxIwHPTaQcHA5eEfMbM+j/AEdGCr7oAA6UEhAu/wCUP1xzO3pnOOflnxMHTioKA+m3EKAf3yy5OMH3uuc889T08IO+EDH+jowTNVz26NV8ATq7XGMEHcCOZySc/wAVY960nOzTFD3bIP3wzruI5Pg9SD9sHMUfX6TGI3C7PEg9Ork/8Jf0Oi7vJyGbz54A8gJbCiFM9fL116UPP0hA/miYQcTkDjCMpzCgKKLEcSBZjAwhGMuBZiijxgbHnGUwjBzGAiYLH9MUcARgW7+5jiCRH2wI8xjBizAQ6RwxjLHzKCxHgx5AojHEUoWY+Yo2YCEMiCTD5SyJoSYsR8Zh4jBHmOFhkRwsmAAD/fyiIh4i25jBHEVk22MVlwRxoeI+2KI2ihYixGGq2YxMaLxhRiMI4j4lD4jCEIlEYmlFiFiEokw0IhAekMLCCy4ai2yUJ8IarC2yiILC2yTbHWuBCEj7ZMEj7JkRBYKDnJ9sQWBFtiKyYJEUmkQlYG3r6YljbAI/PiTBFiMVk2IwEoyo8CFgwqQQoKw1WUOBLGj0j22LXWMvYdqjIGT8TIwssaPUPU62VnD1ncrYBwfgesIsa/gl1Q3MoIwSWUllABAyTjpkgZ9YqeD6ggEUuQQGHzfmsu5SefLK8+ctW9pdSV2E17CGBr7ioVsGIJyoHPmoj0do9QnNTWDtWst3FW5kRO7RWOOeF5S+hB+42o/7l/sB8hyGefUfbI9FoHsdkUAFFexyzBBWiYDM2emCRLrdpdUTnvcYBUAIgUAkH5oGDzAkNXFLFta1QgaxHrcd1X3bq5ywZMbTk9T1kuaDu4HegDFNylQwsRlatlPTB8eh5ekf9yb847psgZIO3KgnGTz5c5Yu4tfYiq7DYpUhERa0G3JHIcupklXF7ld3DgtcAr7lVgyg5Awegz5TWQUhwu4kDunyQGHu9VPRgemOR5+kT8PtAya2ALBAeWCxOAoPnmXk43qAFAcbU2hV2LtXYu0YHwMdu0OoJyXGeXStAowcg4x1Hgeoj0KGp4danN6yoOBlsDmenLOR5zQXsxqSAQikE4yHGAcE5OfDAMG/idtoRXYN3W3a2xd4C9Bv6noM56mWn45qWcOWTcpLbu5rySRtOeXPkZZzE1SHArTjBrYMlrqVsBDir8Jt9R5RU8CuarvVCldvefO97b59Jfr4xeu3b3Y2q6qooqCqH+fgAcs+Mazi9xr7slSoXZ+CTIXyziXwhrD2Qu6ljaDH2EDlM4im1UjKDPwl0rK964PpJYsqHuzBNct7hgSva3OKrAEICAIYMKMdZKokSyZT0lEiiSKINX9cnEYzoWrkcsiQ3iZ6iwM2eA8Av1bYpX3V+da3u1r6Z8T6Sbsl2fGoZrbm2aXT+9bYeQfHPYD+k/V4yzxztQ947nTA0aROS1oNj3KOQZiOaqfo+nOOecm9NNQcP4ZpjtvvfUWDqlQJQHyyvT7ZIvFtFz2cLdwvVvnY+PPlOW4egBAA8uXnPX+yOi7vSIChVmBdwRhtzHx+rlO/F8vtEcJ+6XCrOVukspz+OhLL/wC0xruyK2qbNBet6jrUSFsX0+PxljinZ62zVag0VN3aPkH5q7tisyoDzPM+AxMlOEayoi2um6pwyqCFIck8wCOhHnnlGfrEZ6UlWKsCrLyKkYYH1EmUYE6cqOIKtdyrRr1qNtZ+aNTSrNWSV6j3lPu9R1HIzmVVgSrgqyEqynqrDkRyk8cZpxYPGRs4jOMSPdM2oRaELRIWMW8ZmbVHY0gsOZI8g1FoQZOT8Ji1UlVige99szNTxNM+6Mya7XIUJ/NMPUEZyPGTVw2Yu8lex5pcG7O63VgtptO9igkd5lUrz5BmIB+qdeeRWF0nS2aw9nfFv4If56j9qGPZ7xX+CH+eo/anTwGZXbJlulbjXCdXpCPlND17shWOGrY4zgMPH06y1wXs9rtUm/T6dnTmO8JWuskeCliN31R4pgu9jbDYyovznZUHxY4mj/yC4r/Bf9dT+1NXs12M4jXqUst02BWGbPe1N7+MDoYvGkS9tuILUlfDaDhKVV7yP+kc8wp8+fM/VOdob9EbjXDtVVez6ul62usZgxwVYZ5AMOWcAQKTOXyS7/G47X2d6AW6vcwyKU34/jnkDPVwJ5v7Ka823v4KqJ8Sec9A4hq0pqe2w4StC7MASVUDJM7/ABTOUrLps1a22WXvSmnQttUKxs7sDIcvnH1Y8JkdpO1yjTWPpGVyprQ2hvdqFoytnr5Y85yGs4zqrq9tt5KtglQoUMPAH6sTndZr2qWxEIVbk2OMDBUHcPgYvyfpEus7QalrEd9QzvSwZGZawykeGVUEg5YY6c50fajVpclOtrAAvXu7V8rR4n7CPsnK6LspxDUILKtM5RsYZmSrcPMBiDib2h7J8T+R3UPpyCWFlf3yk+96e9MyWlYT6vn1jHUSyewvFevyU/Dvaf2pzvFFu09hq1FbVuOe1hjcPNT0I+ExeajWOo9Y3ymTaLsfxK1A66R9rDI3PXWx9drMDiWD2E4p/Bf9dT+uPCqrJqs9YGt1eEz58vSXE7CcUH/Vjy5/hav2pjauqytxTdWyOCN1bqVYZ6H4HzmbxSD4klfyVdvI9SfpTB01+Bgy5xzUg4VfmjoJlqcDJ8ZrnmYFqW5H4GfT3Y2pV4dpgoAAorIAHLOMz5d1B5H4GfUvZD/F+m/kK/6M6/GPErvbBxQOwB0+FZ1GdOxOAxAz748podm/azrrNZTXqH060vZtscVFNq7Sc7i5xzAnnuo4Nqu8f966j578xprzy3Egg7ZodmuzF1+sppu0+oSqyza7mi5Aq7Sc7mXA5gTfseie2Dt1ordE+k09i32O1bb0w1dIrcMWL9MkKRgefOencFrCaGkVjGzTV7QByz3YIwPHJnkftD9mOj0PDrdTU9petqQAz5Uiy1EYEfBjKfZf2g8W0tC1HRWahEUCtm0+pVgn4vvBSGE0NKztl2kycaMYyQD8jfOMnH4/lLHD+1/aEk95pAAFJH70cZb/ANcb7rPE/wDJL/zeq/s5p9mfaPr9Rq6qbeGvUlr7WtNeoAQYJzlkA+2BxnHu1/Eb6xRrakTmr47hqrAw8iSZX0nMfnnqntf0qNw/cQC1dte1vxhk4ODPKuHnA/v5/wB/snHuI9N9k4OzUHHLfWAfULzE7u+tXUqwDKwIKkZUg8sHzHOc77PtLs0FZ8bS9pPxJA/MJznCe2JXW3vYx+T3WFV8e5K+4r/+E45/GbmSYrL7Y8I+S2gLzrt3NXz95T1KH0GeR9ZxTWZ1NKno1+nUg+INigiez9seEJrNOHRgzorPU6kFW5cx6g4niFJzqtP4fvrTZHkRcmROfU9j6B7X8QfS8P1F9W0PRRZYgIyuVXIyPL0nl/Cu3XHrUNi6VWRq91bppXKv5EHdzno/tDqZuFaxUBZm01oCqCzMSpGAB1nkfY3tZxXQ6U1/JLba0OK6n0+oV19AQvzZ2GgO2faX+BD8jf8AblIcW4jquJ8PHEtMtYXUHuz3Bq3HaTjJY55gHwnc9gu3Wt1uqNOo0LadBS9osK3gF1ZAE99QOjE/VJfaEf8ACHCf9Lf/AHbRg2PaJxm7R8Ot1FG3vKzUBvUunvWKpyM+RM8i+7BxTPXT/wAw/wC3PTvbBS78IvWtGdi1GERGdj99ToqjM+fE4Pqv4LqfyW/9mZ639D3D2U9s9Vr7b11Hd4qSpl2VlDli2c8znoJj+2dwmsoYfOOmt/8ANixcA/aftkfsH0Vtd2q7yqyvKUYNlVle45fONwGfD7ZD7etw1WlK+NFq+v4RZL+Pseba+wF9xGPQeccWAqOXSQ6zOQCMEDpI15TnJsUVifonedlPapqNJStFtA1CVjajd6arVXwU8iGHrOHjbfSXm4j1ce27/N/+1j+yjj22f5vP5WP6655QK5KlfpNeQ6ntv2+1HEau47paaCyuyB+9stK8wGbAAAODgDqBNTsz7VNTpqVpuoW9a1CLZ3pqt2gYAbk2748pxVdclFAl80elfdnP+T/9qA/+OIe2Yn/s8/Vq1/sxPOVokq6YZk8x2/bbtBfrdLVYihdOWDOoO5g/gXbwUHIxiUOxXAflV20kiqtd9jA+8QTha19Tg8/ASPsrxddMTXcu/T3crExnZnkXA8RjqPTlOo03Dn4feNZpgdTpLEKsKyGtWs+8uR+NtI5H1l+/sdR2m4gmi0JVMKdnc0oOZyRgY88DnmeWVDAA9Of/ANx+KcQGo1Fl43YdyVV2LGteQ246L06CQl5y76V6J7OdUG0z09DTZuA/iWcx+fP2zyTj2mNeptUEqa73Ibl7pD7lb6jidl2P45XpdQWtzssTYzAE7SDlSQPDrK3ajhyavXE8PPfd8FezbzqrsPIksenLBxLbvMWLvAvatqTsps0a3WHCh0tarIxzZ1KnBx1wcS7xr2uii01DRFyoBYjUgbW6hfwfPlzmTxGqnhVRrVlt11qYJHNaFPn5AeXVj6Tz56jkkkkkklj1Zj1MX5Mi49KPttOOXD/t1X/5zi+03bjVazUVXkLUdM2+lEJYI30mJHvHHLy6zGOnhrp+Un1aY9D0ntptCgXaJXfxdLzWreu1kOPtMtj21efDz+VD+znmQ0w8oK1ZOPM/YJPqUx6jT7ZWfkvDz6Z1Q/s5xfHuO3a/Wm20qBUgrWtc4rTr48ySTzPoPISvwqjmT4LGvqStWtA6gj0m/K2M6wdZqQxbl+McH4SvmA1mSeWMkmLM1gnBkitKwMkVpgWVMnUykrSZHkF5TJ0MoJbLC2TSLyQ1Mp1vJg8lFtWz+j0mnwXj9+kb7w+FPNqWBalvq8D6iYQeSCyTbCO4s7RcN1HPV6Oyqw9baBvUnzymD+YwDRwQ9Nfav8Uo+R6e9XOMDx90ef8AFdmL+CVHkdRqSPxQjhfrztEi13bWzYatJSmkrPLKgNcR6YGFPrOTDSG2+ZvyLAX18yckljksSWZj5knrIO6JjveCDz8JH33TnOVutGdeePOHWJEluWPoZNmMDtyH9+Uh0yjBb6vrhXnAH1xaZRyA5ZO4iWRLWvpgEoJ8xMrjF4FAA+H1y3xu7bXgeU5uvW8trDIz9c6xmK1aFjyGY9iYODNbQqqkkdCM48RKWvYF+U15GKm6EpkWY+6UTq8kV5VBhh5RbV5YS6UA8MWSDRS2TLZMxLPOTrZA0N8PfKIski2yWC6rQi8qrbBstnOwTvdKztmRpZ1kJsGDMWNxM74xBY85ClmQP64+6MVOGhq8qNZgRI5lxFtzkYmRY7Bs5IM0Q8QqVj7wmuWaavUl6iGPTkDM3UVbSCejdDL9gHQfN5n1mXqLSxyfDkPQeU6T7osaa7rk+kitf3jI6846QZfH2oN0WYEWYEu6OGkIaFmUTB4W6QAxw8iLIeSq8phoYeUXVeSCyURZCFkDQFsd3lJbJJvmbyJQ8AtAZ5HvmbFicGNukReNumcXUzH+qOrSDMffLhqwbIaPgfHlKpaE9nLEsiUr7cKfXkJTfpJL26SNpuRDK+BI8wmgiVUJMWYAMWZcQQMfMjzFmBLuj7pFmPGCXMcPIgY+YEweEHlctHDQLIshiyVA8INAtd5G3Svuj7pME4aOGkOY4aME2YsyLfEGjBMWgkyPdGLRgMmBmMTBYy4HcxswcxswK8WYOYszQIxgYOY4MYHUxyYELMB8xboJMWYwHmFmRExAyYJMxwZFmPmMEoaPukOY4MYJw0cNK+Y+6ME26FulfdH3S4J90bdIcxswJt0YvI90YtAMtGLQC0bMYAMWY2YsShxFmKNGB4sxoucoLMaMYpA8WYxMQgOTFmCY4gODHzBizAPMQMDMbMCTMWYG6PmAW6ImBuizAPdFmAGi3QDzGg5iLQNvsHoq7uJaWq1Q9dlwVkPRhtPI/ZOrOuoZdW9fCNAU0FhVwbNQLSm8qHC55jlznOezP/G+j/lx/RMv9mdfSnE9VRqbBXp9b8r01rk4VMuWRyfRgOfrNi5xni1OmapLODaDdfRTqQi2agsiXDKI4JG18YJHqJe7UMuhFRv4Nw8jUKWXu7NS+0gAlH5jDYI5TC1PEqNZx7vrbFTTnUr77NhRp6cKgzn6KCbfbbtNotdobu7YpbRrDeiWWKzXI/ut3eB83A6QKdvFqF0lerPB9B3V1z0KO81Heb0GSSM9PWFTxGp9IdUnBtCyLcmnZQ+p71Xf5mRnAB88yDh9FGq4NRpzrNPRZTrNRcyXW7DsZVAIH2xvZpxLS1XX6fV2qtL7LQ+4Cs3aewOm0/xsACBpk1fugug/cnh3fN1Pfao1IdhchmzkEKPKPwnV6K3iNWjbhuhZbiFN1L6ogZTd7veYOR6ichp+1LV8UOv27z31toQtsJVgyKN2DghT19Jq9j+JLqOO6e0K677BkWXvqLCRWRk2sATyEg5HWIBY6joruoHkAxAEhxJ+I/hrP5Wz+kZWzICjRRswCizBzHgPNPgfA7tU+ylQSPnMThVz0yepJx0AJmXOg7HdqX0FpsRd2cHGQCCMjIJB6gxBmcX4ZbprTTcm11wduc5UjIYeYI8ZTzPWfui8P142cR0iqegs/CBR4YcAMv6JmcR9nuntHeaDUhlPMIxDAA+TDn9so5bst2afW2MFcV11BTZaVZ9pckIiIvvO5IOAPI9Ja7Rdir9M9aowuFzmpcI1ViXAZNVlb80bHMHoRO84HRpuHaMh7dlqWra923Ld6AQoRfxhtYjH8YzjO13bL5SyhNxC2i42tmtndU2KFUH3VC58cwMI8B1AW1ti7dMQLT31B2E9Oje99WfzRN2f1Iuro7vNtwylavU7EEAjIDe7yOfexI9XxiyzvM7fv4QNgHomdpznrzPM5lk9pr++F4294qd2CdzALjbkAnlyECLTcB1NiCxKHZD3nve6B96/CZyeWPWZ99ZVipxkcjhlI+oj4zWq7V6pVZFcBHa52QL7rNb87x9fCYgOOnKBZ4XxCzT3JdU22ypt6tjOG+E6f7pfEfp1/k9f6px8UDr/ALpnEfp1fk9Xp6ekf7pfEfp1fk9X6pxx6woHXj2l8R+nV+T1fqi+6XxH6dX5PV+qchGgdh90ziP06vyer9UX3TOI+FlYOMZFFYPxziccsUArLCxJPMsSxPqTkwY8UBsxYjCEIDR8xQTALMaNCgNmXOGcSsocPUxBHUZO0jyIlSLx+sQNHi/GbNQQX8DnHM8+mczOgnx+MKAwijxQGzHzFFA//9k='
                    },                    {
                        title: 'FORNITE',
                        image: 'https://vignette.wikia.nocookie.net/fortnite/images/7/79/Fortnite_%28ok%C5%82adka%29.png/revision/latest?cb=20180509152429&path-prefix=pl'
                    },
                    {
                        title: 'LEAGUE OF LEGENDS',
                        image: 'https://vignette.wikia.nocookie.net/leagueoflegends/images/7/7b/DCP.jpg/revision/latest?cb=20150605153016'
                    },
                ],
                search: ''
            }

        },
        computed: {
            gameResults: function () {
                // Filter results
                return this.games.filter((game) => {
                    return game.title.toLowerCase()
                        .includes(this.search.toLowerCase());
                });
            }
        },

        methods: {
            onScroll (e) {
                this.offsetTop = e.target.scrollTop
            }
        }
    }
</script>
<style scoped>
    .searchbar{
        margin-bottom: 2rem;
        margin-top: auto;
        height: 60px;
        background-color: #353b48;
        border-radius: 30px;
        padding: 10px;
    }

    .search_input{
        color: white;
        border: 0;
        outline: 0;
        background: none;
        width: 0;
        caret-color:transparent;
        line-height: 40px;
        transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
        padding: 0 10px;
        width: 450px;
        caret-color: yellow;
        transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
        background: #353b48;
        color: yellow;
    }

    .search_icon{
        height: 40px;
        width: 40px;
        float: right;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color:white;
    }

</style>
