import React from 'react'
import { Link } from '@inertiajs/react';

export const Navigation = () => {
  return (
    <nav className='pt-5 pb-5 pr-10 pl-10 flex'>
    <div className='flex-1'>
       <Link href={"/"}><h1 className='title-app text-2xl' >EcoTreasures</h1></Link>
    </div>
    <div className='flex-2'>
        <ul className='flex space-x-4 text-gray-50 items-center'>
            <li>Marketplace</li>
            <li>Layanan</li>
            <li className='flex space-x-1'>
                <Link href={"/"} class="text-gray-50 border border-gray-50 hover:bg-gray-600 hover:bg-opacity-5 font-medium rounded-lg text-sm px-5 py-2.5">
                    Login</Link>
                <Link href={"/"} class="focus:outline-none text-gray-50 bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5">Sign Up</Link>
            </li>
        </ul>
    </div>
</nav>
  )
}
