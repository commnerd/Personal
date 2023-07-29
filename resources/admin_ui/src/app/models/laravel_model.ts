import { ApiService } from '@services/api.service';
import { Observable } from 'rxjs';
import { LaravelModel as LaravelModelInterface } from '@interfaces/laravel-model';

export class LaravelModel implements LaravelModelInterface
{
    protected endpoint ?: string;

    protected id ?: number;
    protected created_at ?: Date;
    protected updated_at ?: Date;
    protected deleted_at ?: Date;

    protected fields: Map<string, any> = new Map();
    protected fillable: Array<string> = [];

    constructor(private api: ApiService)
    {}

    get(id ?: number): Observable<LaravelModel> | Observable<Array<LaravelModel>> {
        if(id == undefined) {
            return this.api.get(`/api/${this.endpoint}`) as Observable<Array<LaravelModel>>;
        }
        return this.api.get(`/api/${this.endpoint}/${id}`) as Observable<LaravelModel>;
    }

    save(): Observable<LaravelModel> {
        let data: {[key: string]: any} = {};
        this.fillable.forEach((key: string) => { data[key] = this.fields.get(key); })
        if(this.id == undefined) {
            return this.api.post(data);
        }
        return this.api.put(this.id, data);
    }

    delete(): Observable<boolean> {
        return this.api.delete(this.id).map((value: LaravelModelInterface) => !!value);
    }
}