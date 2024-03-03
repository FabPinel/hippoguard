@extends('layout')

@section('content')
<!-- Police -->

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300&display=swap">
</head>


<!-- Code -->
<div class="text-gray-900 pt-12 pr-0 pb-14 pl-0 bg-white">
    <div class="w-full pt-4 pr-5 pb-6 pl-5 mt-0 mr-auto mb-0 ml-auto space-y-5 sm:py-8 md:py-12 sm:space-y-8 md:space-y-16 max-w-7xl">
        <div class="flex flex-col items-center sm:px-5 md:flex-row">
            <div class="flex flex-col items-start justify-center w-full h-full pt-6 pr-0 pb-6 pl-0 mb-6 md:mb-0 md:w-1/2">
                <div class="flex flex-col items-start justify-center h-full space-y-3 transform md:pr-10 lg:pr-16 md:space-y-5">
                    <div class="bg-[#1c3242] flex items-center leading-none rounded-full text-gray-50 pt-1.5 pr-3 pb-1.5 pl-2 uppercase">
                        <p class="inline">
                            <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </p>
                        <p class="inline text-xs font-medium">ZÉRO DÉCHETS</p>
                    </div>
                    <a class="text-4xl font-bold leading-none lg:text-5xl xl:text-6xl">Adoptez le zéro déchet</a>
                    <div class="pt-2 pr-0 pb-0 pl-0">
                        <p class="inline text-sm font-medium">Vous souhaitez réduire les déchets et le gaspillage
                            dans votre quotidien et/ou vous mobiliser pour diffuser cette démarche à plus grande échelle ?
                            Parfait ! <strong>Eco-Service</strong> vous propose différents niveaux d'action.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="block">
                    <img
                        src="https://www.zerowastefrance.org/wp-content/uploads/2018/10/disco-salade-festival-zero-waste-1024x683.jpg"
                        class="object-cover rounded-lg max-h-64 sm:max-h-96 btn- w-full h-full" />
                </div>
            </div>
        </div>

        <!-- Texte sous ADOPTEZ LE ZÉRO DÉCHET -->
        <div class="w-2/3 mx-auto my-6 bg-gray-50 p-5 rounded-lg text-justify">
            <p class="text-sm font-medium">
                La démarche zéro déchet, zéro gaspillage, c’est un ensemble de pratiques que l’on peut mettre en place pour réduire les déchets et le gaspillage. Et ainsi contribuer à réduire les problèmes environnementaux et sanitaires qu’ils posent. L’objectif zéro déchet à la maison est souvent un point de départ vers la découverte d’autres pratiques écologiques, ou une première étape avant des actions plus collectives.
            </p>
        </div>

        <!-- ÉTAPES -->
        <div class="w-2/3 mx-auto my-6 p-5 rounded-lg text-center">
            <h2 class="text-3xl font-bold mb-4">Découvrez les étapes</h2>
        </div>

        <div class="grid grid-cols-12 sm:px-5 gap-x-8 gap-y-16">
            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                <img
                    src="https://images.unsplash.com/photo-1595278069441-2cf29f8005a4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHdhc3RlfGVufDB8fDB8fHww"
                    class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-" />
                <p class="bg-[#e88229]  flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase">ÉTAPE 1</p>
                <a class="text-lg font-bold sm:text-xl md:text-1xl">Évaluer ses déchets</a>
                <p class="text-sm text-black">Commencez par comprendre la composition de vos déchets. Analysez ce que vous jetez régulièrement et identifiez les articles qui pourraient être évités ou remplacés par des alternatives durables.</p>
            </div>
            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                <img
                    src="https://www.econologie.com/wp4/wp-content/uploads/2020/05/visuel-remplacer-essentiel-820x547.jpg"
                    class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-" />
                <p class="bg-[#1c3242]  flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase">ÉTAPE 2</p>
                <a class="text-lg font-bold sm:text-xl md:text-1xl">Adopter les 5 R</a>
                <ul class="list-disc pl-6 text-sm text-black">
                    <li><strong>Refuser</strong>: refuser ce dont vous n'avez pas besoin</li>
                    <li><strong>Réduire</strong>: diminuer la consommation</li>
                    <li><strong>Réutiliser</strong>: opter pour des articles réutilisables</li>
                    <li><strong>Recycler</strong>: recycler correctement</li>
                    <li><strong>Rendre à la terre</strong>: composter les déchets organiques</li>
                </ul>
            </div>
            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                <img
                    src="https://www.cuistolab.com/images/mag/article-media/xl/3829.jpg"
                    class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-" />
                <p class="bg-[#e88229]  flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase">ÉTAPE 3</p>
                <a class="text-lg font-bold sm:text-xl md:text-1xl">Opter pour des alternatives durables</a>
                <p class="text-sm text-black">Remplacez les produits jetables par des alternatives durables et réutilisables. Par exemple, utilisez des sacs réutilisables, des bouteilles d'eau en acier inoxydable, et des contenants réutilisables.</p>
            </div>
            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                <img
                    src="https://apimani.fr/wp-content/uploads/2023/04/comment-faire-ses-courses-en-vrac.webp"
                    class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-" />
                <p class="bg-[#e88229]  flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase">ÉTAPE 4</p>
                <a class="text-lg font-bold sm:text-xl md:text-1xl">Faire ses courses en vrac</a>
                <p class="text-sm text-black">Privilégiez les épiceries en vrac pour réduire les emballages. Apportez vos propres sacs réutilisables, bocaux ou contenants pour stocker les produits en vrac.</p>
            </div>
            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                <img
                    src="https://sante-pratique-paris.fr/wp-content/uploads/2022/05/ok-adobestock-214597619-alexander-raths-alimentation.jpg"
                    class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-" />
                <p class="bg-[#1c3242]  flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase">ÉTAPE 5</p>
                <a class="text-lg font-bold sm:text-xl md:text-1xl">Adopter une alimentation responsable</a>
                <p class="text-sm text-black">Choisissez des aliments locaux et de saison pour réduire l'empreinte carbone. Évitez les produits sur-emballés et privilégiez les marchés locaux et les producteurs responsables.</p>
            </div>
            <div class="flex flex-col items-start col-span-12 space-y-3 sm:col-span-6 xl:col-span-4">
                <img
                    src="https://piochemag.fr/wp-content/uploads/2021/01/SICTOM_chateaudun-compost.jpg"
                    class="object-cover w-full mb-2 overflow-hidden rounded-lg shadow-sm max-h-56 btn-" />
                <p class="bg-[#e88229]  flex items-center leading-none text-sm font-medium text-gray-50 pt-1.5 pr-3 pb-1.5 pl-3 rounded-full uppercase">ÉTAPE 6</p>
                <a class="text-lg font-bold sm:text-xl md:text-xl">Composter</a>
                <p class="text-sm text-black">Mettez en place un système de compostage pour réduire la quantité de déchets organiques envoyée à la décharge. Le compostage transforme les déchets alimentaires en un engrais naturel pour les plantes.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

