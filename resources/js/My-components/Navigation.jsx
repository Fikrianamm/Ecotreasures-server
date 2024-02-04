import { Link } from '@inertiajs/react'
import { HrefButton , HrefButtonOff } from '@/My-components/Buttons'
import React from 'react'
import { EcoTreasures } from './Logo';

export const Navigation = () => {
  return (
    <nav className='pt-5 pb-5 pr-10 pl-10 flex'>
    <div className='flex-1'>
       <EcoTreasures />
    </div>
    <div className='flex-2'>
        <ul className='flex space-x-4 text-gray-50 items-center'>
        <Link href={"/"}><li className='hov-b'>Marketplace</li></Link>
        <Link href={"#layanan"}><li className='hov-b'>Layanan</li></Link>
            <li className='flex space-x-1'>
                <HrefButtonOff href="/register" nama="Sign Up" />
                <HrefButton href="/login" nama="Login" />
            </li>
        </ul>
    </div>
</nav>
  )
};
