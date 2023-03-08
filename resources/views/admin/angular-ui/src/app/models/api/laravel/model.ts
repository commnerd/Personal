import { Id } from "./id"

export interface Model {
    id?: Id;
    created_at?: Date;
    updated_at?: Date;
    deleted_at?: Date;
}