@extends('layout')
@section('pageTitle', "Contactez-nous !")
@section('content')
    <div x-data="{ userType: '' }">
        <div class="mt-10 mb-6 px-4 flex">
            <div class="w-1/2 px-32 text-xl bg-slate-100">
                <h2 class="font-semibold text-3xl mt-12">Contactez-nous !</h2>
                <div>
                    <div class="flex gap-4 py-4 mt-4">
                        <svg class="w-8 h-8 text-[#e88229]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 14h0a7 7 0 1 0-11.5 0h0l.1.3.3.3L12 21l5.1-6.2.6-.7.1-.2Z"/>
                          </svg>
                          <p>24 rue Marc Donadille 13013</p>
                    </div>
                    <div class="flex gap-4 py-4">
                        <svg class="w-8 h-8 text-[#e88229]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18.4 14.8-1.2-1.3a1.7 1.7 0 0 0-2.4 0l-.7.7a1.7 1.7 0 0 1-2.4 0l-1.9-1.9a1.7 1.7 0 0 1 0-2.4l.7-.6a1.7 1.7 0 0 0 0-2.5L9.2 5.6a1.6 1.6 0 0 0-2.4 0c-3.2 3.2-1.7 6.9 1.5 10 3.2 3.3 7 4.8 10.1 1.6a1.6 1.6 0 0 0 0-2.4Z"/>
                          </svg>
                          <p>06 06 06 06 06</p>
                    </div>
                    <div class="flex gap-4 py-4">
                        <svg class="w-8 h-8 text-[#e88229]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.9 6c.4.3.8.3 1.2 0l7.9-6M4 19h16c.6 0 1-.4 1-1V6c0-.6-.4-1-1-1H4a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z"/>
                          </svg>
                          <p>ecoserviceg3@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="mx-10 w-1/2 shadow-lg py-8 px-8 relative bg-white rounded">
                <h2 class="text-xl text-[#333] font-bold">Envoyez-nous un message</h2>
                <form class="max-w-3xl mx-auto" method="POST" action="{{ route('contact.store') }}"
                x-data="{
                    search: '',
                    products: {{ $products }},
                    id_product: null,
                    get filteredProducts() {
                        return this.products.filter(
                            i => i.name.toLowerCase().startsWith(this.search.toLowerCase())
                        );
                    },
                    isSelected(productId) {
                        return this.id_product === productId;
                    },
                    selectProduct(productId) {
                        if (this.isSelected(productId)) {
                          this.id_product = null;
                        } else {
                          // Sélectionnez le produit sinon
                          this.id_product = productId;
                        }
                        document.getElementById('id_product').value = this.id_product;
                      },
                      deselectProduct() {
                        this.id_product = null;
                        document.getElementById('id_product').value = this.id_product;
                      },
                      getSelectedProductInfo(productId) {
                        const product = this.products.find(p => p.id === productId);
                        return product ? { name: product.name, media: product.media } : null;
                      },
                    }">
                    @csrf
                    <div class="w-full py-2">
                        <select x-model="userType" class="w-full my-4 text-lg font-semibold py-2 px-3 border-2 border-[#e88229] rounded-sm">
                            <option value="">Vous êtes ?</option>
                            <option value="particulier">Un particulier</option>
                            <option value="entreprise">Une entreprise</option>
                        </select>
                    </div>
                    <div x-show="userType === 'particulier'" class="flex gap-6 py-2">
                        <div class="w-full">
                            <label for="lastname">Nom</label>
                            <input type='text' id="lastname" placeholder='Nom' name="lastname"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]"/>
                        </div>

                        <div class="w-full">
                            <label for="firstname">Prénom</label>
                            <input type='text' id="firstname" placeholder='Prénom' name="firstname"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]"/>
                        </div>

                    </div>

                    <div x-show="userType === 'entreprise'">
                        <label for="enterprise">Entreprise</label>
                        <input type='text' id="enterprise" placeholder='Entreprise' name="enterprise"
                            class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]" />

                        <div class="flex gap-6 py-2">
                            <div class="w-full">
                                <label for="lastname" class="flex justify-between">Nom
                                    <span class="text-sm text-slate-400">Optionnel</span>
                                </label>
                                <input type='text' id="lastname" placeholder='Nom' name="lastname_enterprise"
                                    class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]" />
                            </div>

                            <div class="w-full">
                                <label for="firstname" class="flex justify-between">Prénom
                                    <span class="text-sm text-slate-400">Optionnel</span>
                                </label>
                                <input type='text' id="firstname" placeholder='Prénom' name="firstname_enterprise"
                                    class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]" />
                            </div>
                        </div>

                    </div>

                    <div class="flex">
                        <div class="w-full">
                            <label for="phone" class="flex justify-between">Numéro de téléphone
                                <span class="text-sm text-slate-400">Optionnel</span>
                            </label>
                            <input type='phone' id="phone" placeholder='Numéro de téléphone' name="phone"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]" />
                        </div>

                    </div>
                    <div class="py-2">
                        <label for="email">Email
                            <input type='email' id="email" placeholder='Email' name="email"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]" />
                        </label>
                    </div>
                    <div class="py-2">
                        <label for="subject">Sujet</label>
                        <input type='text' id="subject" placeholder='Subject' name="subject"
                            class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]" />
                    </div>

                        <div class="py-2">
                            <label for="message">Message</label>
                            <textarea placeholder='Message' id="message" rows="6" name="message"
                                class="col-span-full w-full rounded px-4 border-2 text-sm pt-3 outline-[#1c3242]"></textarea>
                        </div>

                        <div class="w-full">

                            <input type='hidden' id="id_product" placeholder='Nom du produit' name="id_product"
                                class="w-full rounded py-2.5 px-4 border-2 text-sm outline-[#1c3242]" readonly/>
                        </div>
                        <label for="id_product" class="flex justify-between">Nom du produit
                            <span class="text-sm text-slate-400">Optionnel</span>
                        </label>

                        <div class="py-3">
                            <div class="max-w-7xl mx-auto">
                                        <div class='w-full mx-auto'>
                                            <div class="relative flex items-center w-full h-12 shadow-sm rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                                                <div class="grid place-items-center h-full w-12 text-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                                <input x-model="search"
                                                    class="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
                                                    placeholder="Rechercher un produit..."
                                                    x-on:click="search === '' ? deselectProduct() : ''">
                                            </div>
                                        </div>
                                        <div x-show="search !== '' && filteredProducts.length > 0">
                                            <div class="shadow-lg mx-auto flex">
                                        <template x-for="product in filteredProducts" :key="product.id">
                                            <template x-if="!isSelected(product.id)">
                                                <div class="w-32 m-2 bg-slate-50 overflow-hidden rounded-lg group-hover:opacity-75"
                                                    x-bind:class="{
                                                        'bg-blue-200': isSelected(product.id),
                                                        'selected': isSelected(product.id)
                                                    }"
                                                    x-on:click="selectProduct(product.id)">
                                                    <img class="w-16 h-16 object-cover object-center"
                                                        :src=`/storage/app/public/images/${product.media}`
                                                        alt="product.name">

                                                    <h3 x-text="product.name" class="mt-4 font-medium text-gray-900"
                                                        x-on:click="selectProduct(product.id)"></h3>
                                                    <p class="mt-2 font-medium text-gray-900" x-text="product.price + '€'"
                                                        x-on:click="selectProduct(product.id)"></p>
                                                </div>
                                            </template>
                                        </template>
                                    </div>
                                </div>
                                <div x-show="id_product !== null">
                                    <p>Produit sélectionné :</p>
                                    <div class="flex flex-col">
                                        <img :src=`https://eco-service.labo-g4.fr/storage/app/public/images/${getSelectedProductInfo(id_product).media}`
                                            alt="Product Image" class="w-16 h-16">
                                        <span x-text="getSelectedProductInfo(id_product).name"></span>
                                        <button
                                            class="text-white w-fit mt-2 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                                            x-on:click.prevent="deselectProduct()">Désélectionner</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="flex items-start py-3 gap-3">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded-md bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="text-sm text-center">
                                <label for="terms" class="font-light">J'accepte <a
                                        class="font-medium text-blue-700 hover:underline dark:text-[#e88229]" href="#">les
                                        conditions</a></label>
                            </div>
                        </div>

                    <button type='submit'
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='#fff'
                            class="mr-2 inline" viewBox="0 0 548.244 548.244">
                            <path fill-rule="evenodd"
                                d="M392.19 156.054 211.268 281.667 22.032 218.58C8.823 214.168-.076 201.775 0 187.852c.077-13.923 9.078-26.24 22.338-30.498L506.15 1.549c11.5-3.697 24.123-.663 32.666 7.88 8.542 8.543 11.577 21.165 7.879 32.666L390.89 525.906c-4.258 13.26-16.575 22.261-30.498 22.338-13.923.076-26.316-8.823-30.728-22.032l-63.393-190.153z"
                                clip-rule="evenodd" data-original="#000000" />
                        </svg>
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
