require 'minitest/autorun'
require_relative './binary_tree'

describe BinaryTree do
  describe '#init' do
    it 'init a tree' do
      tree = BinaryTree.new
    end
  end

  describe '#add' do
    it 'have valid root' do
      tree = BinaryTree.new
      tree.add(10)

      tree.to_s.must_equal '10'
    end


    it 'have left node' do
      tree = BinaryTree.new
      tree.add(10)
      tree.add(1)
      left = tree.root.left

      left.to_s.must_equal "1"
    end

    it 'have right node' do
      tree = BinaryTree.new
      tree.add(10)
      tree.add(20)
      right = tree.root.right

      right.to_s.must_equal "20"
    end

    it 'have correct node' do
      tree = BinaryTree.new
      tree.add(10)
      tree.add(1)
      tree.add(20)
      tree.add(15)
      tree.add(2)

      tree.to_s.must_equal "1 2 10 15 20"
    end
  end
end
