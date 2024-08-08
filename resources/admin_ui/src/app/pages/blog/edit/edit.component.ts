import { Component } from '@angular/core';
import {first, Observable} from "rxjs";
import { ActivatedRoute } from "@angular/router";
import { Post } from "@interfaces/blog/post";
import { PostService } from "@services/models/blog/post.service";

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent {
  post$!: Observable<Post | null>;

  constructor(
    private postService: PostService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    this.route.params.pipe(first()).subscribe(params => {
      this.post$ = this.postService.get(params['id'] as number);
    });
  }
}
