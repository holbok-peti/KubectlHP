import { Routes } from '@angular/router';
import { AppSzamlalo } from './app-szamlalo/app-szamlalo';

export const routes: Routes = [
    { path: '', redirectTo: 'szamlalo', pathMatch: 'full' },
    { path: 'szamlalo', component: AppSzamlalo },
    { path: '**', redirectTo: 'szamlalo' }
];
