import { Model } from "./laravel/model";

export interface ContactMessage extends Model {
    name: string;
    email_phone: string;
    message: string;
}