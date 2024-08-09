import { Component, Input, SimpleChanges } from '@angular/core';
import { FormBuilder, FormGroup } from "@angular/forms";
import { Location } from "@angular/common";
import { Post } from "@interfaces/blog/post";
import { PostService } from "@services/models/blog/post.service";
import { first } from "rxjs";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {
  @Input() post!: Post | null;
  postForm!: FormGroup;

  get tags(): Array<string> {
    return this.postForm.value.tags;
  }
  set tags(_tags: Array<string>) {
    this.postForm.setValue({'tags': _tags});
  }

  constructor(
    private formBuilder: FormBuilder,
    private postService: PostService,
    private location: Location
  ) {}

  ngOnInit(): void {
    this.post = {
      title: '',
      slug: '',
      tags: [],
      body: ''
    };
    this.postForm = this.formBuilder.group(this.post);
  }

  ngOnChanges(changes: SimpleChanges): void
  {
    if(this.post) {
      this.postForm.setValue({
        title: changes['post']?.currentValue.title,
        slug: changes['post']?.currentValue.slug,
        tags: changes['post']?.currentValue.tags,
        body: changes['post']?.currentValue.body,
      });
    }
  }

  onSubmit() {
    this.postService.save(Object.assign(this.post!, this.postForm.value)).pipe(first()).subscribe( (rs) => {
      this.location.back();
    });
  }
}
