import {Component, Input, SimpleChanges} from '@angular/core';
import {FormBuilder, FormGroup} from "@angular/forms";
import {Router} from "@angular/router";
import {Post} from "@interfaces/blog/post";
import {PostService} from "@services/models/blog/post.service";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {
  @Input() post!: Post | null;
  postForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private postService: PostService,
    private router: Router
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
    let subscriber = this.postService.save(Object.assign(this.post!, this.postForm.value)).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['blog']);
    });
  }
}
