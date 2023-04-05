import { Component, Input } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { BlogPost } from '@models/api/blog-post';
import { BlogService } from '@services/api/blog.service';

@Component({
  selector: 'blog-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {

  @Input() title: string = '';
  @Input() post: BlogPost = { title: '', content: '' };

  postForm = this.fb.group({
    title: [null, Validators.required],
    content: [null, Validators.required],
  });

  constructor(
    private fb: FormBuilder,
    private blogService: BlogService,
    private router: Router
  ) {}

  onSubmit(): void {
    if(this.postForm.valid) {
      Object.assign(this.post, this.postForm.value);
      let subscription = this.blogService.save(this.post).subscribe( (_: BlogPost) => {
        this.router.navigate(['']);
        subscription.unsubscribe();
      });
    }
  }
}